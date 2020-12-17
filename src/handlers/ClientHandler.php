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
}