<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'contact_address_db';

$connection = new mysqli($host, $username, $password, $db);
if($connection->connect_error){
    echo 'Not connected' . $connection->connect_error; 
}
 else {
    echo 'connected';
}





?>