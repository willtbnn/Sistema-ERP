<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use  \src\handlers\PermissionHandler;
use \src\handlers\CalendarHandler;

class CalendarController extends Controller {
    
    private $loggedUser;
    
    public function __construct(){
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
    }

    public function index($id) {
        $id = $this->loggedUser->id;// id do usuario loggador 
        $name_user = $this->loggedUser->name;
        $events = CalendarHandler::getEvents();
        
        $this->render('calendar', [
            'events' => $events,
            'loggedUser' => $this->loggedUser,
        ]);
    }
    public function toreceive($id){
        $this->render('uploadEvent', [
            'loggedUser' => $this->loggedUser,
        ]);
    }
    public function upload($id_user){
        $id_user = $this->loggedUser->id;
        $name_user = $this->loggedUser->name;
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $title = filter_input(INPUT_POST, 'title'); 
        $address = filter_input(INPUT_POST, 'address');
        $start = filter_input(INPUT_POST, 'start');
        $phone = filter_input(INPUT_POST, 'phone');
        $cost = filter_input(INPUT_POST, 'cost');

        if($title == 'Sessão'){
            $color = '#000000';
        }
        if($title == 'Refim'){
            $color = '#FF4040';
        }
        if($title == 'investimento'){
            $color = '#FFA500';
        }
        if($title == 'Novo'){
            $color = '#7CFC00';
        }
        $events = CalendarHandler::setEvents($name,$email,$title,$address,$start,$color, $phone,$cost,$id_user,$name_user);
        $_SESSION['flash'] = 'Usuario cadastrado com sucesso';
        $this->redirect('/uploadEvent', [
            'loggedUser' => $this->loggedUser,
        ]);
    }
}