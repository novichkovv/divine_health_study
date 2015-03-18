<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 06.03.15
 * Time: 19:47
 */
abstract class controller
{
    protected $vars = array();
    protected $args;
    protected $system_header;
    protected $header;
    protected $footer;
    protected $system_footer;
    protected $controller_name;
    protected $action_name;
    public  $check_auth;

    function __construct($controller, $action)
    {
        $this->controller_name = $controller;
        $this->check_auth = $this->checkAuth();
        $this->action_name = $action . ($this->check_auth ? '_na' : '');
    }

    protected function view($template)
    {
        $template_file = ROOT_DIR . 'templates' . DS . $template . '.php';
        if(!file_exists($template_file)) {
            throw new Exception('cannot find template in ' . $template_file);
        }
        foreach($this->vars as $k => $v) {
            $$k = $v;
        }
        if($this->system_header !== false) {
            require_once(!$this->system_header ? ROOT_DIR . 'templates' . DS . 'system_header.php' : ROOT_DIR . 'templates' . DS . $this->system_header . '.php');
        }

        if($this->header !== false) {
            require_once(!$this->header ? ROOT_DIR . 'templates' . DS . 'header.php' : ROOT_DIR . 'templates' . DS . $this->header . '.php');
        }
        if($template_file !== false) {
            require_once($template_file);
        }
        if($this->footer !== false) {
            require_once(!$this->footer ? ROOT_DIR . 'templates' . DS . 'footer.php' : ROOT_DIR . 'templates' . DS . $this->footer . '.php');
        }
        if($this->system_footer !== false) {
            require_once(!$this->system_footer ? ROOT_DIR . 'templates' . DS . 'system_footer.php' : ROOT_DIR . 'templates' . DS . $this->system_footer . '.php');
        }

    }

    protected function view_only($template)
    {
        $template_file = ROOT_DIR . 'templates' . DS . $template . '.php';
        if(!file_exists($template_file)) {
            throw new Exception('cannot find template in ' . $template_file);
        }
        foreach($this->vars as $k => $v) {
            $$k = $v;
        }
        if($template_file !== false) {
            require_once($template_file);
        }
    }

    abstract function index();

    protected function render($key, $value)
    {
        $this->vars[$key] = $value;
    }

    protected function model($model, $table = null, $db = null, $user = null, $password = null)
    {
        $model_file = ROOT_DIR . 'models' . DS . $model . '_model.php';
        if(file_exists($model_file)) {
            $model_class = $model . '_model';
            $m = new $model_class($table, $db, $user, $password);
        } else {
            $m = new default_model($model);
        }

        return $m;
    }

    public function four_o_four() {
        $this->view('404');
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


}