<?php
namespace src\handlers;
Use \src\models\User;
Use \src\models\Funcionario;
Use \src\models\Client;


class ClientHandler {
    public static function getAllClient(){
        $dados = Client::select()->get();
        $client = [];

        foreach($dados as $listClient){
            $viewClient = new Client();
            $viewClient->id = $listClient['id'];
            $viewClient->name = $listClient['name'];
            $viewClient->email = $listClient['email'];
            $viewClient->service = $listClient['service'];
            $viewClient->phone = $listClient['phone'];
            $viewClient->comment = $listClient['comment'];
            $viewClient->rg = $listClient['rg'];
            $viewClient->cpf = $listClient['cpf'];
            $viewClient->photo_client = $listClient['photo_client'];
            $viewClient->extract = $listClient['extract'];
            $viewClient->residence = $listClient['residence'];
            $viewClient->mirror = $listClient['mirror'];
            $viewClient->printzap = $listClient['printzap'];
            $viewClient->id_user = $listClient['id_user'];
            $viewClient->name_user = $listClient['name_user'];

            $client[] = $viewClient;
        }
        return $client;
    }

    ////// REVER O RECEBIMENTO DE FOTOS !
    public static function setClient($name,$email,$phone,$service,$id_user,$name_user,$rg, $cpf,$photo_client, $extract,$residence,$mirror){
        Client::insert([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'service' => $service,
            'id_user' => $id_user,
            'name_user' => $name_user,
            'rg' => $rg,
            'cpf' => $cpf,
            'photo_client' => $photo_client,
            'extract' => $extract,
            'residence' => $residence,
            'mirror' =>$mirror
        ])->execute();
    }
    public static function setImage($file, $w, $h, $folder){
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
}