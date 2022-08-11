<?php 
$server = '52.45.66.172';
$username = 'motuber';
$password = 'motuber%2022';
$database = 'maliergestion';
try{
    $conn = new PDO("mysql:host=$server;dbname=$database",$username,$password);
    
}catch(PDOException $e){
    echo "Failed connect database: ".$e->getMessage();
}

?>