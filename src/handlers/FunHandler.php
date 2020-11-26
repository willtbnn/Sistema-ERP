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
            $viewEmployee->admission_date = $dadosFun['admission_date'];
            $viewEmployee->rg_beginning = $dadosFun['rg_beginning'];
            $viewEmployee->rg_end = $dadosFun['rg_end'];
            $viewEmployee->cpf_beginning = $dadosFun['cpf_beginning'];
            $viewEmployee->cpf_end = $dadosFun['cpf_end'];
            $viewEmployee->status = $dadosFun['status'];

            return $viewEmployee;
        }     
    }
}