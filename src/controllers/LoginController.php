<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

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
    public function signAction(){
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if($email && $password){

            $token = LoginHandler::verifyLogin($email, $password);
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
    // public function signup() {
        
    //         $this->render('signup', [
    //             'flash' => $flash,
    //             'loggedUser' => $this->$loggedUser,
    //         ]);
    // }
    public function signupAction(){
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password'); 
        $birthdate = filter_input(INPUT_POST, 'birthdate');

        if($name && $email && $password && $birthdate){
            $birthdate = explode('/', $birthdate);
            if(count($birthdate) != 3){
                $_SESSION['flash'] = 'Data de nascimento inválida!';
                $this->redirect('/cadastro');
            }

            $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];

            if(strtotime($birthdate) === false){
                $_SESSION['flash'] = 'Data de nascimento inválida!';
                $this->redirect('/cadastro');
            }
            // Verificando se e-mail existe 
            if(LoginHandler::emailExists($email) === false){
                LoginHandler::addUser($name, $email, $password, $birthdate);
                $_SESSION['flash'] = 'Usuario cadastrado com sucesso';
                $this->redirect('/cadastro');
            }else{
                $_SESSION['flash'] = 'Email já cadastrado.';
                $this->redirect('/cadastro');
            }

        } else{
            $this->redirect('/cadastro');
        }
    }
    public function pegaUsuarios(){
        $usuario = [];

        $usuario = LoginHandler::UsuariosCa();

        return $usuario;
    }
    public function logout(){
        $_SESSION['token'] = '';
        $this->redirect('/login');
    }

}