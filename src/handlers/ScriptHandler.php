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
   public static function DelScript($name, $dir){
      $remove = $dir.'/';
      foreach(scandir($remove) as $fileItem){
         if($fileItem == $name){
            var_dump($fileItem);exit;
            $file = $remove.$fileItem;
            if(file_exists($fileItem)&& is_file($fileItem)){
               unlink($file);
            }
         }
      }
   }
}