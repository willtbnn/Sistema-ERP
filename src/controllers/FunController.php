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
        $flash  ='';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }  
        $users = UserHandler::getUsers();
        $fun = FunHandler::getEmployees();
        $this->render('employee', [
            'loggedUser' => $this->loggedUser,
            'users' => $users,
            'fun' => $fun,
            'flash' => $flash
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
    public function updateFun($id){
        $fun = FunHandler::getFun($id);
        $id = filter_input(INPUT_POST, 'id');
        $name = filter_input(INPUT_POST, 'name');
        $full_name = filter_input(INPUT_POST, 'full_name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone');
        $office = filter_input(INPUT_POST, 'office');
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        $rg_beginning = filter_input(INPUT_POST, 'rg_beginning');
        $rg_end = filter_input(INPUT_POST, 'rg_end');
        $cpf_beginning = filter_input(INPUT_POST, 'cpf_beginning');
        $cpf_end = filter_input(INPUT_POST, 'cpf_end');
        // print_r($full_name);exit;
        
        if($name && $email && $birthdate){
            $birthdate = explode('/', $birthdate);
            // vendo data de nascimento e configurando para formato BR
            if(count($birthdate) != 3){
                $_SESSION['flash'] = 'Data de nascimento inválida!';
                $this->redirect('/employee', [
                    'flash' => $flash,
                    'loggedUser' => $this->loggedUser,
                    'fun' => $fun,
                    ]);
            }
            
            $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];
            
            if(strtotime($birthdate) === false){
                
                $_SESSION['flash'] = 'Data de nascimento inválida!';
                $this->redirect('/employee', [
                    'flash' => $flash,
                    'loggedUser' => $this->loggedUser,
                    'fun' => $fun,]);
                // print_r($id);exit;
            }
            // vendo data de nascimento e configurando para formato BR
            // Verificando se e-mail existe 
 
            if($email != $fun->email){
                if(FunHandler::emailExists($email) === false){
                   
                    $_SESSION['flash'] = 'Usuario Atualizado email com sucesso';
                    $this->redirect('/employee', [
                        'flash' => $flash,
                        'loggedUser' => $this->loggedUser,
                        'fun' => $fun,]);
                    // print_r($id);exit;
                }else{
                    $_SESSION['flash'] = 'Email já cadastrado.';
                    $this->redirect('/employee', [
                        'flash' => $flash,
                        'loggedUser' => $this->loggedUser,
                        'fun' => $fun,]);
                    // print_r($id);exit;
                }
            }
            FunHandler::aditEmployee($id,$name,$full_name,$email,$phone,$office, $birthdate,$rg_beginning,$rg_end,$cpf_beginning,$cpf_end);
                    $_SESSION['flash'] = 'Usuario Atualizado com sucesso';
                    $this->redirect('/employee', [
                        'flash' => $flash,
                        'loggedUser' => $this->loggedUser,
                        'fun' => $fun,]);
        } else{
            $this->redirect('/employee', [
                'loggedUser' => $this->loggedUser,
                'fun' => $fun,]);
        }
    }
    public function addEmployees(){
        $flash  ='';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $users = UserHandler::getUsers();
        $fun = FunHandler::getEmployees();
        $this->render('/addfun', [
            'loggedUser' => $this->loggedUser,
            'users' => $users,
            'fun' => $fun,
            'flash' => $flash
            ]);
    }
    public function addAction(){
        $name = filter_input(INPUT_POST, 'name');
        $full_name = filter_input(INPUT_POST, 'full_name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone');
        $office = filter_input(INPUT_POST, 'office');
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        $rg_beginning = filter_input(INPUT_POST, 'rg_beginning');
        $rg_end = filter_input(INPUT_POST, 'rg_end');
        $cpf_beginning = filter_input(INPUT_POST, 'cpf_beginning');
        $cpf_end = filter_input(INPUT_POST, 'cpf_end');

        if($name && $email && $birthdate){
            $birthdate = explode('/', $birthdate);
            if(count($birthdate) != 3){
                $_SESSION['flash'] = 'Data de nascimento inválida!';
                $this->redirect('/employee/addfun');
            }

            $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];

            if(strtotime($birthdate) === false){
                $_SESSION['flash'] = 'Data de nascimento inválida!';
                $this->redirect('/employee/addfun');
            }
            // Verificando se e-mail existe 
            if(FunHandler::emailExists($email) === false){
                FunHandler::addFun($name,$full_name,$email,$phone,$office, $birthdate,$rg_beginning,$rg_end,$cpf_beginning,$cpf_end);
                $_SESSION['flash'] = 'Usuario cadastrado com sucesso';
                $this->redirect('/employee/addfun');
            }else{
                $_SESSION['flash'] = 'Email já cadastrado.';
                $this->redirect('/employee/addfun');
            }

        } else{
            $this->redirect('/employee/addfun');
        }
    }

   
    public function deleteFun($id){
        $fun = FunHandler::getFun($id);
        
        $id = $fun->id;
        $flash  ='';
        // if(!empty($_SESSION['flash'])){
        //     $flash = $_SESSION['flash'];
        //     $_SESSION['flash'] = '';
        // }
        if(!empty($id)){
            FunHandler::delete($id);
            $flash = 'Deletado com sucesso!';
            $this->redirect('/employee',[
                'flash' => $flash
            ]);
        }else{
            $flash = 'Erro ao deleta !';
            $this->redirect('/employee',[
                'flash' => $flash
            ]);
        }
        
    }
}