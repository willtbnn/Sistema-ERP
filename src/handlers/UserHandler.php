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
                $loggedUser->password = $data['password'];
                $loggedUser->birthdate = $data['birthdate'];
                $loggedUser->funcao = $data['funcao'];
                $loggedUser->city = $data['city'];
                $loggedUser->work = $data['work'];
                $loggedUser->avatar = $data['avatar'];
                $loggedUser->cover = $data['cover'];
                $loggedUser->hour = $data['hour_login'];
                $loggedUser->token = $data['token'];

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
                $hour = date('H:i:s');
                User::update()->set('token', $token)->set('hour_login', $hour)->where('email', $email)->execute();

                return $token;
            }
        }
        return false;
    }
    // AINDA NÂO ESTA SENDO USADO REVER
    public static function tempoLogin(){
        $_SESSION['registro'] = time();
        $tempo = $_SESSION['registro'];
        return $tempo;
    }
    //Verificando permisão do usuario logado
    public static function temPermissao($p){
        if($p == 'Desenvolvedor' || $p == 'Coordenador'){
            return true;
        }
        return false;
    }
    // PEGANDO SOMENTE UM USUARIO
    public static function getUserSingle($id){
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
        }
        $dadosUser = User::select()->where('id', $id)->one();
        // print_r($dadosUser);exit;
        
        // transformar o resultado em objetos dos models
        if(count($dadosUser) > 0){
            $UserSingle = new User();
            $UserSingle->id = $dadosUser['id'];
            $UserSingle->email = $dadosUser['email'];
            $UserSingle->name = $dadosUser['name'];
            $UserSingle->birthdate = $dadosUser['birthdate'];
            $UserSingle->avatar = $dadosUser['avatar'];
            $UserSingle->cover = $dadosUser['cover'];
            //essas duas rever!!!!
            // $UserSingle->id_user = $dadosUser['id_user'];
            $UserSingle->funcao = $dadosUser['funcao'];

            return $UserSingle;
        }     
    }
    //Aqui estou vendo como lista os usuarios
    public static function getUsers(){
        $dados = User::select()->get();
        $users = [];
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
            $viewUsers->funcao = $listaUsers['funcao'];
            $viewUsers->hour = $listaUsers['hour_login'];

            $users[] = $viewUsers;
        }
        return $users;
    }
    
    public static function emailExists($email){
        $user = User::select()->where('email', $email)->one();
        return $user ? true : false;
    }
    public static function idExists($id){
        $user = User::select()->where('id', $id)->one();
        return $user ? true : false;
    }
    //recebendo avatar sp Usuario
    public static function cutImage($file, $w, $h, $folder){
        list($widthOrig, $heightOrig) = getimagesize($file['tmp_name']);
        $ratio = $widthOrig / $heightOrig;
        
        $newWidth = $w;
        // a aultura vai ser porpociona a largura
        $newHeight = $newWidth / $ratio;

        // caso a altura seja meno que queremos faremos o contrario
        if($newHeight < $h){
            $newHeight = $h;
            $newWidth = $newHeight * $ratio;
        }
        // cortando a imagem 
        $x = $w - $newWidth;
        $y = $h - $newHeight;
        // cortando dois dois lado para centralizar o corte
        $x = $x < 0 ? $x / 2 : $x;
        $y = $y < 0 ? $y / 2 : $y;

        $finalImage = imagecreatetruecolor($w, $h);
        switch($file['type']){
            case 'image/jpg':
            case 'image/jpeg':
                $image = imagecreatefromjpeg($file['tmp_name']);
            break;
            case 'image/png':
                $image = imagecreatefrompng($file['tmp_name']);
            break;
        }
        // pega a original
        imagecopyresampled(
            $finalImage, $image,
            $x, $y, 0, 0,
            $newWidth, $newHeight, $widthOrig, $heightOrig
        );

        $fileName = md5(time().rand(0,9999)).'.jpg';
        //Salva imagem no servidor
        imagepng($finalImage, $folder.'/'.$fileName);

        return $fileName;
    }
    public static function updateBirthdate($birthdate, $id){
        User::update()
            ->set('birthdate', $birthdate)
            ->where('id', $id)
        ->execute();
    }
    public static function updateEmail($email, $id){
        User::update()
            ->set('email', $email)
            ->where('id', $id)
        ->execute();
    }
    public static function updateName($name, $id){
        User::update()
            ->set('name', $name)
            ->where('id', $id)
        ->execute();
    }
    public static function updatePassword($password, $id){
        User::update()
            ->set('password', $password)
            ->where('id', $id)
        ->execute();
    }
    public static function updateFuncao($funcao, $id){
        User::update()
            ->set('funcao', $funcao)
            ->where('id', $id)
        ->execute();
    }
    public static function updateAvatar($avatar, $id){
        User::update()
                ->set('avatar', $avatar)
            ->where('id', $id)
        ->execute();
    }
    
    public static function addUser($avatar, $name, $email, $password, $birthdate,$funcao){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        // $token = md5(time().rand(0,999).time());
        User::insert([
            'email' => $email,
            'name' => $name,
            'password' => $hash,
            'birthdate' => $birthdate,
            'avatar' => $avatar,
            'funcao' => $funcao,
            'cover' => 'default.png'
            // 'token' => $token,
        ])->execute();

        // return $token;
    }
    public static function delete($id){
        User::delete()->where('id', $id)->execute();
    }
    
}