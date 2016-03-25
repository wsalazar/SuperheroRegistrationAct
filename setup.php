<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define('PS', PATH_SEPARATOR);
define('APP', realpath('Application/'));
set_include_path(
    implode(PS, array(
        APP,
        get_include_path()
        )));
define('BASE_PATH', realpath(dirname(__FILE__)));
spl_autoload_register(function ($class_name) {
    $filename = BASE_PATH.DIRECTORY_SEPARATOR.str_replace('\\','/',$class_name) . '.php';
    require $filename;
});