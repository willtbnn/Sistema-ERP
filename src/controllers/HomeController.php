<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use \src\handlers\EventHandler;


class HomeController extends Controller {
        
    private $loggedUser;
    
    public function __construct(){
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
    }

    public function index() {
        $flash  ='';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $users = UserHandler::getUsers();
        $events = EventHandler::getEvents();
        $this->render('home', [
            'loggedUser' => $this->loggedUser,
            'users' => $users,
            'flash' => $flash,
            'events' => $events,
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
    
    public function helps() {
        $this->render('help', ['loggedUser' => $this->loggedUser]);
    }
    /// adicioando Usuario
    public function signupAction(){
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password'); 
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        $funcao = filter_input(INPUT_POST, 'funcao');
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
            
            // ADICIONANDO AVATAR DO USUARIO
            if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name'])){
                $newAvatar = $_FILES['avatar'];
                /// DESENVOLVIMENTO 
                $files_permissions = array('image/jpeg','image/jpg','image/png');
                if(in_array($newAvatar['type'],$files_permissions)){
                    // executando a função (((AQUI REQUE ATENÇÂO PARA IMPLEMENTAÇÂO CORRETA))))
                    // aqui estamos pegando a imagem e difinindo o tamanho e o destino 
                    $avatarName = UserHandler::cutImage($newAvatar, 200, 200, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\avatars');
                    $avatar = $avatarName; 
                    
                    //PRODUÇÃO
                    // $avatarName = UserHandler::cutImage($newAvatar, 200, 200, '/home/u445206020/domains/goldbanksbr.com.br/public_html/works/public/assets/images/media/avatars');
                    // $avatar = $avatarName; 
                    //PRODUÇÃO
                }
                
            }
            // Verificando se e-mail existe 
            if(UserHandler::emailExists($email) === false){
                UserHandler::addUser($avatar, $name, $email, $password, $birthdate, $funcao);
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
    //configurando usuario logado
    public function UserLogged(){
        if(!empty($this->loggedUser->id) && isset($this->loggedUser->id)){
            //verificando permissao do usuario logado a entra na página
            if(UserHandler::temPermissao($this->loggedUser->funcao) == true){
                $this->render('/configuration', [
                    'loggedUser' => $this->loggedUser,
                ]);
            }else{
                $_SESSION['flash']= 'Voce não tem acesso ';
                $this->redirect('/');
            }

        } 
    }
    public function User($id){
        $users = UserHandler::getUserSingle($id);
        if(isset($id)){
            $this->render('userUpdate',[
                'loggedUser' => $this->loggedUser,
                'users' => $users,
            ]);
        }
    }
    public function UpdateUser($id){
        $users = UserHandler::getUserSingle($id);
        $name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email');
        $newPassword = filter_input(INPUT_POST, 'password');
        $newPasswordConf = filter_input(INPUT_POST, 'password-conf');
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        $funcao = filter_input(INPUT_POST, 'funcao');
        
        // echo $this->loggedUser->avatar;exit;
        // print_r($_FILES['avatar']);exit;
        if(!empty($birthdate)){
            $birthdate = explode('/', $birthdate);
            if(count($birthdate) != 3){
                $_SESSION['flash'] = 'Data de nascimento inválida!';
                $this->redirect('/');
            }

            $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];

            if(strtotime($birthdate) === false){
                $_SESSION['flash'] = 'Data de nascimento inválida!';
                $this->redirect('/');
            }
            UserHandler::updateBirthdate($birthdate, $id);
        }
        // Fazendo Update no Avatar
        if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name'])){
            $newAvatar = $_FILES['avatar'];
            unlink('C:/xampp/htdocs/goldbanks/works/public/assets/images/media/avatars/'.$users->avatar);
            /// DESENVOLVIMENTO 
            $files_permissions = array('image/jpeg','image/jpg','image/png');
            if(in_array($newAvatar['type'],$files_permissions)){
                // executando a função (((AQUI REQUE ATENÇÂO PARA IMPLEMENTAÇÂO CORRETA))))
                // aqui estamos pegando a imagem e difinindo o tamanho e o destino 
                $avatarName = UserHandler::cutImage($newAvatar, 200, 200, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\avatars');
                $avatar = $avatarName; 
            }
            UserHandler::updateAvatar($avatar, $id);
        }
        if(!empty($name)) {
            UserHandler::updateName($name, $id);
        }
        if(!empty($funcao)) {
            UserHandler::updateFuncao($funcao, $id);
        }
        if(!empty($newPassword) && !empty($newPasswordConf)) {
            if($newPassword !== $newPasswordConf) {
                $_SESSION['flash'] = 'Senhas não conferem!';
                $this->redirect('/');
            }
            $hash = password_hash($newPassword, PASSWORD_DEFAULT);
            UserHandler::updatePassword($hash, $id);
        }
         // Verificando se e-mail existe 
        if(!empty($email)){
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            if($email === false) {
                $_SESSION['flash'] = 'E-mail inválido!';
                $this->redirect('/');
            }
            $emailExists = UserHandler::emailExists($email, true);
            if($emailExists !== false) {
                if($emailExists['id'] !== $id) {
                    $_SESSION['flash'] = 'E-mail em uso por outro usuário!';
                    $this->redirect('/');
                }
            }
            UserHandler::updateEmail($email, $id);
        }
        $this->redirect('/');
    }

    public function UploadUserLogged($id){
        $id = $this->loggedUser->id;
        $name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email');
        $newPassword = filter_input(INPUT_POST, 'password');
        $newPasswordConf = filter_input(INPUT_POST, 'password-conf');
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        // echo $this->loggedUser->avatar;exit;
        // print_r($_FILES['avatar']);exit;
        if(!empty($birthdate)){
            $birthdate = explode('/', $birthdate);
            if(count($birthdate) != 3){
                $_SESSION['flash'] = 'Data de nascimento inválida!';
                $this->redirect('/userUpdate');
            }

            $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];

            if(strtotime($birthdate) === false){
                $_SESSION['flash'] = 'Data de nascimento inválida!';
                $this->redirect('/configuration');
            }
            UserHandler::updateBirthdate($birthdate, $id);
        }
        // ADICIONANDO AVATAR DO USUARIO
        if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name'])){
            $newAvatar = $_FILES['avatar'];
            unlink('C:/xampp/htdocs/goldbanks/works/public/assets/images/media/avatars/'.$this->loggedUser->avatar);
            /// DESENVOLVIMENTO 
            $files_permissions = array('image/jpeg','image/jpg','image/png');
            if(in_array($newAvatar['type'],$files_permissions)){
                // executando a função (((AQUI REQUE ATENÇÂO PARA IMPLEMENTAÇÂO CORRETA))))
                // aqui estamos pegando a imagem e difinindo o tamanho e o destino 
                $avatarName = UserHandler::cutImage($newAvatar, 200, 200, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\avatars');
                $avatar = $avatarName; 
                
                //PRODUÇÃO
                // $avatarName = UserHandler::cutImage($newAvatar, 200, 200, '/home/u445206020/domains/goldbanksbr.com.br/public_html/works/public/assets/images/media/avatars');
                // $avatar = $avatarName; 
                //PRODUÇÃO
            }
            UserHandler::updateAvatar($avatar, $id);
        }
        // Verificando se e-mail existe 
        if(!empty($email)){
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);
            if($email === false) {
                $_SESSION['flash'] = 'E-mail inválido!';
                $this->redirect('/configuration');
            }
            $emailExists = UserHandler::emailExists($email, true);
            if($emailExists !== false) {
                if($emailExists['id'] !== $id) {
                    $_SESSION['flash'] = 'E-mail em uso por outro usuário!';
                    $this->redirect('/configuration');
                }
            }
            UserHandler::updateEmail($email, $id);
        }
        if(!empty($newPassword) && !empty($newPasswordConf)) {
            if($newPassword !== $newPasswordConf) {
                $_SESSION['flash'] = 'Senhas não conferem!';
                $this->redirect('/configuration');
            }
            $hash = password_hash($newPassword, PASSWORD_DEFAULT);
            UserHandler::updatePassword($hash, $id);
        }
        if(!empty($name)) {
            UserHandler::updateName($name, $id);
        }
        $this->redirect('/configuration');
    }
    public function deleteUser($id){
        // Esse render é para pegar id unico 
        $users = UserHandler::getUserSingle($id);

        $id = $users->id;
       
        if(!empty($id)){
            unlink('C:/xampp/htdocs/goldbanks/works/public/assets/images/media/avatars/'.$users->avatar);
            UserHandler::delete($id);
            $_SESSION['flash']= 'Deletado com sucesso!';
            $this->redirect('/');
        }else{
            $_SESSION['flash'] = 'Erro ao deleta !';
            $this->redirect('/');
        }

    }
}