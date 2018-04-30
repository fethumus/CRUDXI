<?php
class Orders extends mysqli {
    function __construct($host, $user, $pass, $db) {
        parent::__construct($host, $user, $pass, $db);
    }   

    function insert($itemid, $qty) {
        
    }
}

// $order = new Orders('localhost','user','pass','database');

// the implementation
$sqlusers = new MySqli($hostname, $uaername, $password);
$sqlusers->select_db('mydb_user');

$sqlusers->query('SELECT * FROM users');
$count = $sqlusers->count();
$result = $sqlusers->query_result();


// new instance 
$sql = new MySqli($hostname, $uaername, $password);
$sql->select_db('mydb_orders');

$sql->query('SELECT * FROM orders');
$count = $sql->count();
$result = $sql->query_result();

$sqlusers->query('Select * FROM ...'); // unsa na connection akong gina tukoy?
