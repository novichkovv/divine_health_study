<?php
/**
 * Created by PhpStorm.
 * User: novichkov
 * Date: 25.02.15
 * Time: 21:01
 */
session_start();
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', realpath($_SERVER['DOCUMENT_ROOT']) . DS);
define('SITE_DIR', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('SH_ROOT_DIR', str_replace('reports' . DS, '', ROOT_DIR));
define('R_SITE_DIR', SITE_DIR . 'reports/');

require_once(ROOT_DIR . 'config.php');
require_once(ROOT_DIR . 'model.php');
require_once(ROOT_DIR . 'registry.php');
require_once(ROOT_DIR . 'router.php');
