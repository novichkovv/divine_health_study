<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 25.02.15
 * Time: 21:02
 */
if($_REQUEST['route']) {
    $arr = explode('/', $_REQUEST['route']);
    array_pop($arr);
    if(count($arr) === 1) {
        $controller = $arr[0];
        $action = 'index';
    } else {
        $controller = $arr[0];
        $action = $arr[1];
    }
    array_slice($arr, 2);
    $vars = $arr;
} else {
    $controller = 'index';
    $action = 'index';
}
$filename = ROOT_DIR . 'controllers' . DS . $controller . '_controller.php';
if(!file_exists($filename)) {
    throw new Exception('Cannot find controller ' . $filename);
}
require_once(ROOT_DIR . 'controller.php');
require_once($filename);
$class_name = $controller . '_controller';
$controller = new $class_name($vars, $class_name, $action);
$controller->$action();

