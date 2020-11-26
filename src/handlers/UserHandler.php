<?php
namespace src\handlers;

Use \src\models\User;

class UserHandler {
    public static function checkLogin(){
        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];
           
            $data = User::select()->where('token', $token)->one();
            if(count($data) > 0){
                
                $loggedUser = new User();
                $loggedUser->id = $data['id'];
                $loggedUser->email = $data['email'];
                $loggedUser->name = $data['name'];
                $loggedUser->brithdate = $data['birthdate'];
                $loggedUser->funcao = explode(',', $data['funcao']);
                $loggedUser->city = $data['city'];
                $loggedUser->work = $data['work'];
                $loggedUser->avatar = $data['avatar'];
                $loggedUser->cover = $data['cover'];

                return $loggedUser;
            }
        }
        return false;     
    }
    //Verificando permisão do usuario logado
    public static function temPermissao($p){
        if(in_array($p, $this->funcao)){
            return true;
        }
        return false;
    }
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
    public static function verifyLogin($email, $password){
        $user = User::select()->where('email', $email)->one();

        if($user){
            if(password_verify($password, $user['password'])){
                $token = md5(time().rand(0,999).time());
                User::update()->set('token', $token)->where('email', $email)->execute();

                return $token;
            }
        }
        return false;
    }
    public static function emailExists($email){
        $user = User::select()->where('email', $email)->one();
        return $user ? true : false;
    }
    public static function idExists($id){
        $user = User::select()->where('id', $id)->one();
        return $user ? true : false;
    }
    public static function addUser($name, $email, $password, $birthdate){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        // $token = md5(time().rand(0,999).time());
        User::insert([
            'email' => $email,
            'name' => $name,
            'password' => $hash,
            'birthdate' => $birthdate,
            'avatar' => 'default-avatar.png',
            'cover' => 'default.png'
            // 'token' => $token,
        ])->execute();

        return $token;
    }
    
}