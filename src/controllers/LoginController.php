<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;

class LoginController extends Controller {

    public function signin() {
        $flash  ='';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('login', [
            'flash' => $flash
        ]);
    }
     /// login Usuario
    public function signAction(){
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        
        if($email && $password){
            
            $token = UserHandler::verifyLogin($email, $password);
            if($token){
                $_SESSION['token'] = $token;
                $this->redirect('/');
            }else{
                $_SESSION['flash'] = 'E-mail e/ou senha não conferem.';
                $this->redirect('/login');
            }

        }else{
            $_SESSION['flash'] = 'Digite os campos de e-mail e/ou senha';
            $this->redirect('/login');
        }
    }
    

    //Nem  usando isso estou
    // public function pegaUsuarios(){
    //     $usuario = [];

    //     $usuario = UserHandler::UsuariosCa();

    //     return $usuario;
    // }
    
    public function logout(){
        $_SESSION['token'] = '';
        $this->redirect('/login');
    }

}