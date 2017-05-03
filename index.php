<?php
require_once 'vendor/autoload.php';

define('__APP_PATH__', __DIR__ . '/app/');
define('__PUBLIC_PATH__', __DIR__ . '/public/');

$ctrl = null;

if(!empty($_REQUEST['controller'])) {
    $ctrlName = sprintf('\App\Controller\%sController', ucwords($_REQUEST['controller']));
    $ctrl = new $ctrlName();
} else {
    $ctrl = new \App\Controller\UserController();
}

if(empty($_REQUEST['action'])) {
    $ctrl->index();
} else {
    $ctrlActionName = strtolower($_REQUEST['action']);
    $ctrl->$ctrlActionName();
}

