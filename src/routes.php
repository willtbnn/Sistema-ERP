<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/login', 'LoginController@signin');


$router->post('/login', 'LoginController@signAction');
//logout
$router->get('/inlogout', 'LoginController@logout');

// Esse vai ser feito pelo usuario do sistema Adicionando Usuario no sistema
$router->get('/cadastro', 'HomeController@signup');
// recebendo cadastro de usuario
$router->post('/cadastro', 'HomeController@signupAction');
//deletar usuario
$router->get('/user/{id}', 'HomeController@deleteUser');
//Vendo informações do Usuario clicado
$router->get('/configuration/{id}/userUpdate', 'HomeController@User');
// Editando usuario
$router->post('/configuration/{id}/userUpdate', 'HomeController@UpdateUser');
//usuario logado configuração
$router->get('/configuration', 'HomeController@UserLogged');
// Atualizando Usuario Logado CONFIGURAÇÂO
$router->post('/configuration/{id}', 'HomeController@UploadUserLogged');

/////////////////////////Router DE FUNCIONARIOS/////////////////////////
// parte de funcionarios"
$router->get('/employee', 'FunController@employees');
//deletando funcionario
$router->get('/employee/{id}', 'FunController@deleteFun');


//adicionando funcionario
$router->get('/addfun', 'FunController@addEmployees');
$router->post('/addfun', 'FunController@addAction');

// Ler informações do funcionario
$router->get('/employee/{id}/viewfun', 'FunController@fun');

// edição de funcioarios
$router->post('/employee/{id}/viewfun', 'FunController@updateFun');


/////////////////////////Router DE AGENDAMENTO/////////////////////////
//calendario 
$router->get('/calendar', 'CalendarController@index');
// Visualizando agendamentos cadastrados
$router->get('/viewschedule', 'CalendarController@view');
// vendo agendamento(seeSchedule)
$router->get('/schedule/{id}/editevent', 'CalendarController@seeSchedule');
// atualizando agendamento(seeSchedule)
$router->post('/schedule/{id}/editevent', 'CalendarController@updateSchedule');
// deletando agendamentoschedule
$router->get('/schedule/{id}', 'CalendarController@delSchedule');

//formulario de evento para calendario  @recebendo
$router->get('/uploadevent', 'CalendarController@toreceive');
// Enviando evento para o calendario @enviando
$router->post('/uploadevent', 'CalendarController@upload');


/////////////////////////Router DE CLIENTE/////////////////////////
//Ver os clientes 
$router->get('/viewclient', 'ClientController@viewClient');

// Adicionando cliente
$router->get('/uploadclient', 'ClientController@toreceive');
//recebendo envio de cliente
$router->post('/uploadclient', 'ClientController@addClient');

//Abrindo cliente para edição cliente
$router->get('/viewclient/{id}/editclient', 'ClientController@viewSingleClient');
// Editando Cliente
$router->post('/viewclient/{id}/editclient', 'ClientController@updateClient');

//Excluindo cliente
$router->get('/viewclient/{id}/delclient', 'ClientController@delClient');