<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use  \src\handlers\PermissionHandler;
use \src\handlers\ClientHandler;

class ClientController extends Controller {
    private $loggedUser;
    
    public function __construct(){
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
    }
    public function viewClient(){
        $id_user = $this->loggedUser->id;
        $name_user = $this->loggedUser->name;
        $clients = ClientHandler::getAllClient();
        $this->render('viewclient', [
            'loggedUser' => $this->loggedUser,
            'client' => $clients
        ]);
    }
    public function toreceive(){
        $this->render('uploadClient', [
            'loggedUser' => $this->loggedUser,
        ]);
    }
    public function addClient(){
        $id_user = $this->loggedUser->id;
        $name_user = $this->loggedUser->name;
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone');
        $service = filter_input(INPUT_POST, 'service');
        if(isset($_FILES['rg']) && !empty($_FILES['rg']['tmp_name'])){
            $newRg = $_FILES['rg'];
            /// DESENVOLVIMENTO 
            $rgName = ClientHandler::setImage($newRg, 960, 1280, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\anexos\rg');
            
            $rg = $rgName;
        }
        if(isset($_FILES['cpf']) && !empty($_FILES['cpf']['tmp_name'])){
            $newCpf = $_FILES['cpf'];
            /// DESENVOLVIMENTO 
            $cpfName = ClientHandler::setImage($newCpf, 960, 1280, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\anexos\cpf');
            
            $cpf = $cpfName;
        }
        if(isset($_FILES['photo_client']) && !empty($_FILES['photo_client']['tmp_name'])){
            $newPhoto_client = $_FILES['photo_client'];
            /// DESENVOLVIMENTO 
            $photo_clientName = ClientHandler::setImage($newPhoto_client, 960, 1280, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\anexos\self');
            
            $photo_client = $photo_clientName;
        }
        if(isset($_FILES['extract']) && !empty($_FILES['extract']['tmp_name'])){
            $newExtract = $_FILES['extract'];
            /// DESENVOLVIMENTO 
            $extractName = ClientHandler::setImage($newExtract, 960, 1280, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\anexos\extrato');
            
            $extract = $extractName;
        }
        if(isset($_FILES['residence']) && !empty($_FILES['residence']['tmp_name'])){
            $newResidence = $_FILES['residence'];
            /// DESENVOLVIMENTO 
            $residenceName = ClientHandler::setImage($newResidence, 960, 1280, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\anexos\comprovante');
            
            $residence = $residenceName;
        }
        if(isset($_FILES['mirror']) && !empty($_FILES['mirror']['tmp_name'])){
            $newMirror = $_FILES['mirror'];
            /// DESENVOLVIMENTO 
            $mirrorName = ClientHandler::setImage($newMirror, 960, 1280, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\anexos\espelho');
            
            $mirror = $mirrorName;
        }
        ClientHandler::setClient($name,$email,$phone,$service,$id_user,$name_user,$rg, $cpf, $photo_client, $extract, $residence, $mirror);
        $clients = ClientHandler::getAllClient();
        $this->redirect('/viewclient', [
            'loggedUser' => $this->loggedUser,
            'client' => $clients
        ]);
    }
    public function viewSingleClient($id){
        if(!empty($_GE['id']) && isset($_GET['id'])){
            $id = $_GE['id'];
        }
        $client = ClientHandler::getClient($id);
        
        $this->render('editclient', [
            'loggedUser' => $this->loggedUser,
            'client' => $client,
            ]);
    }
    public function updateClient($id){
        $client = ClientHandler::getClient($id);
        $id = $client->id;
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone');
        $service = filter_input(INPUT_POST, 'service');
        if(!empty($service)){
            ClientHandler::editService($service, $id);
        }
        if(!empty($phone)){
            ClientHandler::editPhone($phone, $id);
        }
        if(!empty($email)){
            ClientHandler::editEmail($email, $id);
        }
        if(isset($_FILES['rg']) && !empty($_FILES['rg']['tmp_name'])){
            $newRg = $_FILES['rg'];
            /// DESENVOLVIMENTO 
            $rgName = ClientHandler::setImage($newRg, 960, 1280, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\anexos\rg');
            
            $rg = $rgName;
            ClientHandler::editRg($rg,$id);
        }
        if(isset($_FILES['cpf']) && !empty($_FILES['cpf']['tmp_name'])){
            $newCpf = $_FILES['cpf'];
            /// DESENVOLVIMENTO 
            $cpfName = ClientHandler::setImage($newCpf, 960, 1280, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\anexos\cpf');
            
            $cpf = $cpfName;
            ClientHandler::editCpf($cpf, $id);
        }
        if(isset($_FILES['photo_client']) && !empty($_FILES['photo_client']['tmp_name'])){
            $newPhoto_client = $_FILES['photo_client'];
            /// DESENVOLVIMENTO 
            $photo_clientName = ClientHandler::setImage($newPhoto_client, 960, 1280, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\anexos\self');
            
            $photo_client = $photo_clientName;
            ClientHandler::editSelf($photo_client, $id);
        }
        if(isset($_FILES['extract']) && !empty($_FILES['extract']['tmp_name'])){
            $newExtract = $_FILES['extract'];
            /// DESENVOLVIMENTO 
            $extractName = ClientHandler::setImage($newExtract, 960, 1280, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\anexos\extrato');
            
            $extract = $extractName;
            ClientHandler::editExtract($extract, $id);
        }
        if(isset($_FILES['residence']) && !empty($_FILES['residence']['tmp_name'])){
            $newResidence = $_FILES['residence'];
            /// DESENVOLVIMENTO 
            $residenceName = ClientHandler::setImage($newResidence, 960, 1280, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\anexos\comprovante');
            
            $residence = $residenceName;
            ClientHandler::editResidence($residence, $id);
        }
        if(isset($_FILES['mirror']) && !empty($_FILES['mirror']['tmp_name'])){
            $newMirror = $_FILES['mirror'];
            /// DESENVOLVIMENTO 
            $mirrorName = ClientHandler::setImage($newMirror, 960, 1280, 'C:\xampp\htdocs\goldbanks\works\public\assets\images\media\anexos\espelho');
            
            $mirror = $mirrorName;
            ClientHandler::editMirror($mirror, $id);
        }
        if(!empty($name)){
            ClientHandler::editName($name,$id);
            $_SESSION['flash'] = 'Nome do cliente atualizado com sucesso';
        $this->redirect('/viewclient', [
            'loggedUser' => $this->loggedUser,
            'client' => $clients        
        ]);
        }
        $_SESSION['flash'] = 'Cliente atualizado com sucesso';
        $this->redirect('/viewclient', [
            'loggedUser' => $this->loggedUser,
            'client' => $clients        
        ]);
    }
    public function delClient($id){
        $client = ClientHandler::getClient($id);
        $id = $client->id;
        if(!empty($id)){
            ClientHandler::delete($id);
            $_SESSION['flash']= 'Deletado com sucesso!';
            $this->redirect('/viewclient');
        }else{
            $_SESSION['flash'] = 'Erro ao deleta !';
            $this->redirect('/viewclient');
        }
    }
}