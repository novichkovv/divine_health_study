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
        $this->action_name = $action;
    }

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

    protected function render($key, $value)
    {
        $this->vars[$key] = $value;
    }

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
}