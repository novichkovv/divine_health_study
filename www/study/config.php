<?php 
/**
* configuration file
*/

error_reporting(E_ERROR | E_WARNING | E_PARSE);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', realpath($_SERVER['DOCUMENT_ROOT']) . DS . 'study' . DS);
define('ROOT_DIR_R', realpath($_SERVER['DOCUMENT_ROOT']) . DS . 'reports' . DS);
define('R_SITE_DIR', 'http://shop.drcolbert.crom/reports/');
define('CORE_DIR', ROOT_DIR . 'core' . DS);
define('SITE_DIR', 'http://' . str_replace('http://', '', $_SERVER['HTTP_HOST'] . '/study/'));
define('TEMPLATE_DIR', ROOT_DIR . 'templates' . DS);


define('DB_NAME', 'shop');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
