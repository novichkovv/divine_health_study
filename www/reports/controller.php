<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 25.02.15
 * Time: 21:12
 */
abstract class controller
{
    protected $model;
    protected $vars = array();
    protected $args;
    protected $system_header;
    protected $header;
    protected $footer;
    protected $system_footer;
    protected $controller_name;
    protected $action_name;

    function __construct($args, $controller, $action)
    {
        $this->args = $args;
        $this->controller_name = $controller;
        if($_REQUEST['ajax']) {
            $action .= '_ajax';
        }
        $this->check_auth = $this->checkAuth();
        if($this->check_auth) {
            $this->sidebar();
        }
        $this->action_name = $action . ($this->check_auth ? '_na' : '');
    }

    /**
     * @param string $template
     * @throws Exception
     */

    protected function view($template)
    {
        $template_file = ROOT_DIR . 'templates' . DS . $template . '.php';
        if(!file_exists($template_file)) {
            throw new Exception('cannot find template ' . $template_file);
        }
        $vars = $this->args;
        foreach($this->vars as $k => $v) {
            $$k = $v;
        }
        require_once(!$this->system_header ? ROOT_DIR . 'templates' . DS . 'system_header.php' : ROOT_DIR . 'templates' . DS . $this->system_header . '.php');
        require_once(!$this->header ? ROOT_DIR . 'templates' . DS . 'header.php' : ROOT_DIR . 'templates' . DS . $this->header . '.php');
        require_once($template_file);
        require_once(!$this->footer ? ROOT_DIR . 'templates' . DS . 'footer.php' : ROOT_DIR . 'templates' . DS . $this->footer . '.php');
        require_once(!$this->system_footer ? ROOT_DIR . 'templates' . DS . 'system_footer.php' : ROOT_DIR . 'templates' . DS . $this->system_footer . '.php');

    }

    /**
     * @param string $template
     * @throws Exception
     */

    protected function view_only($template)
    {
        $template_file = ROOT_DIR . 'templates' . DS . $template . '.php';
        if(!file_exists($template_file)) {
            throw new Exception('cannot find template in ' . $template_file);
        }
        foreach($this->vars as $k => $v) {
            $$k = $v;
        }
        require_once($template_file);
    }


    abstract function index();

    /**
     * @param string $key
     * @param mixed $value
     */

    protected function render($key, $value)
    {
        $this->vars[$key] = $value;
    }

    /**
     * @param $model
     * @param string $table
     * @param string $db
     * @param string $user
     * @param string $password
     * @return model
     */

    protected function model($model, $table = null, $db = null, $user = null, $password = null)
    {
        $model_file = ROOT_DIR . 'models' . DS . $model . '_model.php';
        if(file_exists($model_file)) {
            require_once($model_file);
            $model_class = $model . '_model';
            $m = new $model_class($table ? $table : $model, $db, $user, $password);
        } else {
            require_once(ROOT_DIR . 'models' . DS . 'default_model.php');
            $m = new default_model($model);
        }
        return $m;
    }

    /**
     * @return bool
     */
    protected function checkAuth()
    {
        if($_SESSION['auth']) {
            if($user = $this->model('report_users')->getByFields(array(
                'id' => $_SESSION['user']['id'],
                'login' => $_SESSION['user']['login'],
                'user_password' => $_SESSION['user']['password']
            ))) {
                registry::set('auth', true);
                registry::set('user', $user);
                return true;
            } else {
                return false;
            }
        } elseif($_COOKIE['user_id']) {
            if($user = $this->model('report_users')->getByFields(array(
                'id' => $_COOKIE['user_id'],
                'login' => $_COOKIE['user_login'],
                'user_password' => $_COOKIE['user_password']
            ))) {
                registry::set('auth', true);
                registry::set('user', $user);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * @param string $user
     * @param string $password
     * @param bool $remember
     * @return bool
     */

    protected function auth($user, $password, $remember = false)
    {
        if($user = $this->model('report_users')->getByFields(array(
            'login' => $user,
            'user_password' => $password))) {
            if(!$remember) {
                $_SESSION['user']['id'] = $user['id'];
                $_SESSION['user']['login'] = $user['login'];
                $_SESSION['user']['password'] = $user['user_password'];
                $_SESSION['auth'] = 1;
            } else {
                @setcookie("user_id", $user['id'], time()+60*60*24*30*30, "/");
                @setcookie("user_password", $user['user_password'], time()+60*60*24*30*30, "/");
                @setcookie("user_login", $user['login'], time()+60*60*24*30*30, "/");
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return void
     */

    protected function logOut()
    {
        unset($_SESSION['user']);
        unset($_SESSION['auth']);
        @setcookie("user_id", "", time() - 3600, "/");
        @setcookie("user_password", "", time() - 3600, "/");
        @setcookie("user_login", "", time() - 3600, "/");
    }

    private function sidebar()
    {
        $tmp = $this->model('report_group_routes')->getByField('id_group', registry::get('user')['user_group'], true);
        $permissions = [];
        foreach($tmp as $v) {
            $permissions[] = $v['id_route'];
        }
        $sidebar = [];
        $tmp = $this->model('report_routes')->getAll('position');
        $permit_page = false;
        foreach($tmp as $v) {
            if(!in_array($v['id'], $permissions)) {
                continue;
            }
            if(!$v['parent']) {
                foreach($v as $key => $val) {
                    $sidebar[$v['id']][$key] = $val;
                    if($v['route'] == $_REQUEST['route']) {
                        $permit_page = true;
                    }
                }
            } else {
                foreach($v as $key => $val) {
                    $sidebar[$v['parent']]['children'][$v['id']][$key] = $val;
                    if($v['route'] == $_REQUEST['route']) {
                        $permit_page = true;
                    }
                }
            }
        }
        if(!$permit_page) {
            echo 'ACCESS DENIED';
            exit;
        }
        $this->render('sidebar', $sidebar);
    }

}