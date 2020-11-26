<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;

class HomeController extends Controller {
        
    private $loggedUser;
    
    public function __construct(){
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
    }

    public function index() {
        $users = UserHandler::getUsers();
        $this->render('home', [
            'loggedUser' => $this->loggedUser,
            'users' => $users,
            ]);
    }
    public function signup() {
        $flash  ='';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }  
        $this->render('signup', [
            'flash' => $flash,
            'loggedUser' => $this->loggedUser,
        ]);
    
    
    }
}