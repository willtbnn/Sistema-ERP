<?php
namespace src\handlers;
Use \src\models\User;
Use \src\models\Funcionario;
Use \src\models\Event;


class CalendarHandler {
    public static function getEvents(){
        $dados = Event::select()->get();
        $events = [];
        // transforma o resultado em objeto
        foreach($dados as $eventsList){
            $list = new Event();
            $id = $eventsList['id'];
            $title = urldecode($eventsList['title']);
            $start = $eventsList['start'];
            $id_user = $eventsList['id_user'];
            $name = urldecode($eventsList['name']);
            $email = $eventsList['email'];
            $address = urldecode($eventsList['address']);
            $phone = $eventsList['phone'];
            $cost = $eventsList['cost']; 
            $color = $eventsList['color'];
            $name_user = $eventsList['name_user'];  

            $events[] = [
                'id' => $id,
                'title' => $title,
                'start' => $start,
                'id_user' => $id_user,
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'cost' => $cost,
                'color' => $color,
                'name_user' => $name_user
            ];
        }
        return $events;
    }
    public static function setEvents($name,$email,$title,$address,$start,$color, $phone,$cost,$id_user,$name_user){
        Event::insert([
            'color' => $color,
            'name' => $name,
            'email' => $email,
            'title' => $title,
            'address' => $address,
            'start' => $start,
            'phone' => $phone,
            'cost' => $cost,
            'id_user' => $id_user,
            'name_user' => $name_user
        ])->execute();
    }
}