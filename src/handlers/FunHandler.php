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
            $viewFun->city = $listaFun['phone'];
            $viewFun->work = $listaFun['office'];
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
    public static function aditEmployee($id,$name,$full_name,$email,$phone,$office, $birthdate,$rg_beginning,$rg_end,$cpf_beginning,$cpf_end){
        Funcionario::Update()
                ->set('name', $name)
                ->set('email', $email)
                ->set('birthdate', $birthdate)
                ->set('phone',$phone)
                ->set('office',$office)
                ->set('rg_beginning',$rg_beginning)
                ->set('rg_end',$rg_end)
                ->set('full_name',$full_name)
                ->set('cpf_beginning',$cpf_beginning)
                ->set('cpf_end',$cpf_end)
            ->Where('id', $id)
        ->execute();
       
    }
    public static function emailExists($email){
        $Funcionario = Funcionario::select()->where('email', $email)->one();
        return $Funcionario ? true : false;
    }
}