<?php
namespace src\handlers;
Use \src\models\User;
Use \src\models\Funcionario;


class FunHandler {
    public static function getEmployees(){
        $dados = Funcionario::select()->get();
        $fun = [];
        
        // transformar o resultado em objetos dos models
        foreach($dados as $listaFun){
            $viewFun = new Funcionario();
            $viewFun->id = $listaFun['id'];
            $viewFun->email = $listaFun['email'];
            $viewFun->name = $listaFun['name'];
            $viewFun->birthdate = $listaFun['birthdate'];
            // OLHA O ERRO !
            $viewFun->city = $listaFun['phone'];
            $viewFun->work = $listaFun['office'];
             // OLHA O ERRO !
            $viewFun->avatar = $listaFun['avatar'];
            $viewFun->cover = $listaFun['cover'];

            $fun[] = $viewFun;
        }
        return $fun;
    }
    public static function getFun($id){
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
        }
        $dadosFun = Funcionario::select()->where('id', $id)->one();
        // print_r($dadosFun);exit;
        
        // transformar o resultado em objetos dos models
        if(count($dadosFun) > 0){
            $viewEmployee = new Funcionario();
            $viewEmployee->id = $dadosFun['id'];
            $viewEmployee->email = $dadosFun['email'];
            $viewEmployee->name = $dadosFun['name'];
            $viewEmployee->birthdate = $dadosFun['birthdate'];
            $viewEmployee->phone = $dadosFun['phone'];
            $viewEmployee->office = $dadosFun['office'];
            $viewEmployee->avatar = $dadosFun['avatar'];
            $viewEmployee->cover = $dadosFun['cover'];
            $viewEmployee->full_name = $dadosFun['full_name'];
            $viewEmployee->rg_beginning = $dadosFun['rg_beginning'];
            $viewEmployee->rg_end = $dadosFun['rg_end'];
            $viewEmployee->cpf_beginning = $dadosFun['cpf_beginning'];
            $viewEmployee->cpf_end = $dadosFun['cpf_end'];
            $viewEmployee->status = $dadosFun['status'];

            return $viewEmployee;
        }     
    }
    public static function editEmail($email, $id){
        Funcionario::Update()
                    ->set('email', $email)
                ->where('id', $id)
            ->execute();
    }
    public static function editBirthate($birthdate, $id){
        Funcionario::Update()
                ->set('birthdate', $birthdate)
            ->where('id', $id)
        ->execute();
    }
    public static function editOficce($office, $id){
        Funcionario::Update()
                ->set('office',$office)
            ->where('id', $id)
        ->execute();
    }
    public static function editPhone($phone, $id){
        Funcionario::Update()
                ->set('phone',$phone)
            ->where('id', $id)
        ->execute();
    }
    public function editCover($cover, $id){
        Funcionario::Update()
                ->set('cover',$cover)
            ->where('id', $id)
        ->execute();
    }
    public static function editEmployee($id,$name, $full_name,$rg_beginning,$rg_end,$cpf_beginning,$cpf_end){
        Funcionario::Update()
                ->set('name',$name)
                ->set('rg_beginning',$rg_beginning)
                ->set('rg_end',$rg_end)
                ->set('full_name',$full_name)
                ->set('cpf_beginning',$cpf_beginning)
                ->set('cpf_end',$cpf_end)
            ->Where('id', $id)
        ->execute();
    }
    public static function addFun($name,$full_name,$email,$phone,$office,$cover, $birthdate,$rg_beginning,$rg_end,$cpf_beginning,$cpf_end){
        Funcionario::insert([
            'name' => $name,
            'full_name' => $full_name,
            'email' => $email,
            'phone' =>$phone,
            'office' => $office,
            'cover' => $cover,
            'birthdate' => $birthdate,
            'rg_beginning' => $rg_beginning,
            'rg_end' => $rg_end,
            'cpf_beginning' => $cpf_beginning,
            'cpf_end' => $cpf_end
        ])->execute();
    }
    public static function emailExists($email){
        $Funcionario = Funcionario::select()->where('email', $email)->one();
        return $Funcionario ? true : false;
    }
    public static function delete($id){
        Funcionario::delete()->where('id', $id)->execute();
    }

    // tratando da media AQUI VAMOS CORTA A IMAGEM NO TAMANHO IDEAL
    public function cutImage($file, $w, $h, $folder){
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