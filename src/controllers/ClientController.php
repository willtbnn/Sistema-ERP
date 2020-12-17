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
}