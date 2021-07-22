<?php
namespace src\handlers;

Use \src\models\User;

class PermissionHandler {
   //Aqui estou vendo como lista os usuarios
   public static function getUsers(){
    $dados = User::select()->get();
    $users = [];
    // foreach($dados as $listaUsers){
    //     $users[] = $listaUsers;
    // }
    // transformar o resultado em objetos dos models
    foreach($dados as $listaUsers){
        $viewUsers = new User();
        $viewUsers->id = $listaUsers['id'];
        $viewUsers->email = $listaUsers['email'];
        $viewUsers->name = $listaUsers['name'];
        $viewUsers->password = $listaUsers['password'];
        $viewUsers->birthdate = $listaUsers['birthdate'];
        $viewUsers->city = $listaUsers['city'];
        $viewUsers->work = $listaUsers['work'];
        $viewUsers->avatar = $listaUsers['avatar'];
        $viewUsers->cover = $listaUsers['cover'];

        $users[] = $viewUsers;
    }
    return $users;
    }
    //Verificando permisão do usuario logado
    public static function temPermissao($p){
        if($p == 'Desenvolvedor' || $p == 'Coordenador' || $p == 'Gerente'){
            return true;
        }
        return false;
    }
}