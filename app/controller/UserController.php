<?php
namespace App\Controller;

use App\Model\User,
    App\Service\UserService;

class UserController {
    public function index () {
        require_once  __APP_PATH__ . '/views/header.html';
        require_once  __APP_PATH__ . '/views/user/index.html';
        require_once  __APP_PATH__ . '/views/footer.html';
    }

    public function getAll () {
        header('application/json');
        print_r(UserService::getAll());
    }
}