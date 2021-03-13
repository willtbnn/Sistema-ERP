<?php
namespace src\handlers;

Use \src\models\User;
Use \src\models\Event;


class ScriptHandler {
   public static function salveScript($name,$file, $folder){
    $newName = $name.'.pdf';
    move_uploaded_file($file['tmp_name'], $folder.'/'.$newName);

    return $newName;
   }
}