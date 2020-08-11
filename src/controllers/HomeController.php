<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class HomeController extends Controller {
    
    private $loggedUser;
    
    public function __construct(){
        $this->loggedUser = LoginHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
    }

    public function index() {
        $this->render('home', [
            'loggedUser' => $this->loggedUser 
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