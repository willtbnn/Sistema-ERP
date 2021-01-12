<?php
namespace src\handlers;

Use \src\models\User;
Use \src\models\Event;


class EventHandler {
    public static function getEvents(){
        $dados = Event::select()->get();
        $events = [];
        // transforma o resultado em objeto
        foreach($dados as $eventsList){
            $list = new Event();
            $id = $eventsList['id'];
            $title = urldecode($eventsList['title']);
            $start = $eventsList['start'];
            $hour = $eventsList['hour'];
            $id_user = $eventsList['id_user'];
            $name = urldecode($eventsList['name']);
            $email = $eventsList['email'];
            $address = urldecode($eventsList['address']);
            $address_neigh = urldecode($eventsList['address_neigh']);
            $address_city = urldecode($eventsList['address_city']);
            $address_state = urldecode($eventsList['address_state']);
            $address_zipcode = urldecode($eventsList['address_zipcode']);
            $address_number = urldecode($eventsList['address_number']);
            $address2 = urldecode($eventsList['address2']);
            $phone = $eventsList['phone'];
            $cost = $eventsList['cost']; 
            $color = $eventsList['color'];
            $name_user = $eventsList['name_user'];  

            $events[] = [
                'id' => $id,
                'title' => $title,
                'start' => $start,
                'hour' => $hour,
                'id_user' => $id_user,
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'address_neigh' => $address_neigh,
                'address_city' => $address_city,
                'address_state' => $address_state,
                'address_zipcode' => $address_zipcode,
                'address_number' => $address_number,
                'address2' => $address2,
                'phone' => $phone,
                'cost' => $cost,
                'color' => $color,
                'name_user' => $name_user
            ];
        }
        return $events;
    }
    public static function getEventsingle($id){
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
        }
        $dadosEvent = Event::select()->where('id', $id)->one();
        // print_r($dadosFun);exit;
        // transformar o resultado em objetos dos models
        
        if(count($dadosEvent) > 0){
            $eventSingle = new Event();
            $eventSingle->id = $dadosEvent['id'];
            $eventSingle->title = $dadosEvent['title'];
            $eventSingle->start = $dadosEvent['start'];
            $eventSingle->hour = $dadosEvent['hour'];
            $eventSingle->id_user = $dadosEvent['id_user'];
            $eventSingle->name = $dadosEvent['name'];
            $eventSingle->email = $dadosEvent['email'];
            $eventSingle->address = $dadosEvent['address'];
            $eventSingle->address_neigh = $dadosEvent['address_neigh'];
            $eventSingle->address_city = $dadosEvent['address_city'];
            $eventSingle->address_state = $dadosEvent['address_state'];
            $eventSingle->address_zipcode = $dadosEvent['address_zipcode'];
            $eventSingle->address_number = $dadosEvent['address_number'];
            $eventSingle->address2 = $dadosEvent['address2'];
            $eventSingle->phone = $dadosEvent['phone'];
            $eventSingle->color = $dadosEvent['color'];
            $eventSingle->cost = $dadosEvent['cost'];
            $eventSingle->name_user = $dadosEvent['name_user'];

            return $eventSingle;
        }     
    }
    public static function setEvents($name,$email,$title,$address,$address_neigh, $address_city,$address_state,$address_zipcode,$address_number,$address2,$start,$hour,$phone,$color,$cost,$id_user,$name_user){
        Event::insert([
            'name' => $name,
            'email' => $email,
            'title' => $title,
            'address' => $address,
            'address_neigh' => $address_neigh,
            'address_city' => $address_city,
            'address_state' => $address_state,
            'address_zipcode' => $address_zipcode,
            'address_number' => $address_number,
            'address2' => $address2,
            'start' => $start,
            'hour' => $hour,
            'phone' => $phone,
            'color' => $color,
            'cost' => $cost,
            'id_user' => $id_user,
            'name_user' => $name_user
        ])->execute();
    }
    public static function updateEvent($id,$name,$email,$title,$address,$address_neigh, $address_city,$address_state,$address_zipcode,$address_number,$address2,$start,$hour,$phone,$color,$cost){
        Event::Update()
            ->set('name', $name)
            ->set('email', $email)
            ->set('title', $title)
            ->set('address', $address)
            ->set('address_neigh', $address_neigh)
            ->set('address_city', $address_city)
            ->set('address_state', $address_state)
            ->set('address_zipcode', $address_zipcode)
            ->set('address_number', $address_number)
            ->set('address2', $address2)
            ->set('start', $start)
            ->set('hour', $hour)
            ->set('phone', $phone)
            ->set('color', $color)
            ->set('cost', $cost)
        ->where('id', $id)
    ->execute();
    }
    public static function delete($id){
        Event::delete()->where('id', $id)->execute();
    }
}