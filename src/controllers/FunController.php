<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\FunHandler;


class FunController extends Controller {
    
    private $loggedUser;

    public function __construct(){
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
    }

    public function employees() {
        $users = UserHandler::getUsers();
        $fun = FunHandler::getEmployees();
        $this->render('employee', [
            'loggedUser' => $this->loggedUser,
            'users' => $users,
            'fun' => $fun
            ]);
    }
    public function fun($id) {
        $users = UserHandler::getUsers();
        $fun = FunHandler::getFun($id);
        //vendo se pego informação do funcionario        
        if(!empty($atts['id'])){
            $id = $atts['id'];
        }
        

        $this->render('viewfun', [
            'loggedUser' => $this->loggedUser,
            'users' => $users,
            'fun' => $fun
            ]);
    }
    
}