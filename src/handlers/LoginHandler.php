<?php
namespace src\handlers;

Use \src\models\User;

class LoginHandler {
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
                $loggedUser->city = $data['city'];
                $loggedUser->work = $data['work'];
                $loggedUser->avatar = $data['avatar'];
                $loggedUser->cover = $data['cover'];

                return $loggedUser;
            }
        }
        return false;
        
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
        $token = md5(time().rand(0,999).time());
        User::insert([
            'email' => $email,
            'name' => $name,
            'password' => $hash,
            'birthdate' => $birthdate,
            'token' => $token,
        ])->execute();

        return $token;
    }
}