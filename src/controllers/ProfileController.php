<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use  \src\handlers\PermissionHandler;

class ProfileController extends Controller {
    
    private $loggedUser;
    
    public function __construct(){
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
    }

    public function index($atts = []) {
        $users = UserHandler::getUsers();
        $this->render('home', [
            'loggedUser' => $this->loggedUser,
            'users' => $users,
            ]);
    }
}