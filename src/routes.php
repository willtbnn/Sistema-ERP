<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/login', 'LoginController@signin');


$router->post('/login', 'LoginController@signAction');
//logout
$router->get('/inlogout', 'LoginController@logout');

// Esse vai ser feito pelo usuario do sistema
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