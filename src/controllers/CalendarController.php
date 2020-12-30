<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use  \src\handlers\PermissionHandler;
use \src\handlers\EventHandler;

class CalendarController extends Controller {
    
    private $loggedUser;
    
    public function __construct(){
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false){
            $this->redirect('/login');
        }
    }
    public function view($id_user){
        $flash  ='';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $id_user = $this->loggedUser->id;
        $events = EventHandler::getEvents();
        
        $this->render('viewschedule', [
            'loggedUser' => $this->loggedUser,
            'event' => $events,
            'flash' => $flash
        ]);
    }
    public function seeSchedule($id){
        $flash  ='';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        // $id = $this->loggedUser->id;
        $events = EventHandler::getEventsingle($id);
        
        $this->render('editevent', [
            'loggedUser' => $this->loggedUser,
            'event' => $events
        ]);
    }
    //update do agendamento
    public function updateSchedule($id){
        $event = EventHandler::getEventsingle($id);
        $id = $event->id;
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $title = filter_input(INPUT_POST, 'title'); 
        $address = filter_input(INPUT_POST, 'address');
        $start = filter_input(INPUT_POST, 'start');
        $hour = filter_input(INPUT_POST, 'hour');
        $phone = filter_input(INPUT_POST, 'phone');
        $cost = filter_input(INPUT_POST, 'cost');
        if(!empty($name && $email && $title && $address && $start && $hour && $phone & $cost)){
            switch($title){
                case 'cessão':
                    $color = '#1C1C1C';
                    break;
                case 'investimento' :
                    $color = '#FFD700';
                    break;
                case 'Empréstimo Consignado':
                    $color = '#FF3030';
                    break;
                case 'Cartão de Crédito':
                    $color = '#8B7500';
                    break;
                case 'Financiamentos':
                    $color = '#008B00';
                    break;
                case 'Portabilidade':
                    $color = '#8B1C62';
                    break;
                case 'Crédito Pessoal':
                    $color = '#FFA500';
                    break;
                case 'Cartão Saque':
                    $color = '#00FA9A';
                    break;
                case 'Crédito SIAPE | INSS':
                    $color = '#D2691E';
                    break;
            }
            // echo $name;exit;
            EventHandler::updateEvent($id, $name, $email, $title, $address, $start, $hour, $phone, $color,$cost);
            $_SESSION['flash'] = 'Alterado com sucesso';
            $this->redirect('/viewschedule', [
                'loggedUser' => $this->loggedUser,
                'event' => $event
            ]);
        }
    }
    // esse aqui que esta mostrando o calendario
    public function index($id) {
        $id = $this->loggedUser->id;// id do usuario loggador 
        $name_user = $this->loggedUser->name;
        $events = EventHandler::getEvents();
        
        $this->render('calendar', [
            'events' => $events,
            'loggedUser' => $this->loggedUser,
        ]);
    }
    public function toreceive($id){
        $flash  ='';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('uploadevent', [
            'loggedUser' => $this->loggedUser,
            'flash' => $flash
        ]);
    }
    public function upload($id_user){
        $flash  ='';
        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $id_user = $this->loggedUser->id;
        $name_user = $this->loggedUser->name;
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $title = filter_input(INPUT_POST, 'title'); 
        $address = filter_input(INPUT_POST, 'address');
        $start = filter_input(INPUT_POST, 'start');
        $hour = filter_input(INPUT_POST, 'hour');;
        $phone = filter_input(INPUT_POST, 'phone');
        $cost = filter_input(INPUT_POST, 'cost');
        switch($title){
            case 'cessão':
                $color = '#1C1C1C';
                break;
            case 'investimento' :
                $color = '#FFD700';
                break;
            case 'Empréstimo Consignado':
                $color = '#FF3030';
                break;
            case 'Cartão de Crédito':
                $color = '#8B7500';
                break;
            case 'Financiamentos':
                $color = '#008B00';
                break;
            case 'Portabilidade':
                $color = '#8B1C62';
                break;
            case 'Crédito Pessoal':
                $color = '#FFA500';
                break;
            case 'Cartão Saque':
                $color = '#00FA9A';
                break;
            case 'Crédito SIAPE | INSS':
                $color = '#D2691E';
                break;
        }
        $events = EventHandler::setEvents($name,$email,$title,$address,$start,$hour,$phone,$color,$cost,$id_user,$name_user);
        $_SESSION['flash'] = 'Agendamento cadastrado com sucesso';
        $this->redirect('/uploadevent', [
            'loggedUser' => $this->loggedUser,
            'flash' => $flash
        ]);
    }
    public function delSchedule($id){
        $event = EventHandler::getEventsingle($id);
        $id = $event->id;
        if(!empty($id)){
            EventHandler::delete($id);
            $_SESSION['flash']= 'Deletado com sucesso!';
            $this->redirect('/viewschedule');
        }else{
            $_SESSION['flash'] = 'Erro ao deleta !';
            $this->redirect('/viewschedule');
        }
    }
}