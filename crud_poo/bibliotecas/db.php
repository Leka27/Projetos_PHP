<?php

$host = "192.168.100.71";
$user = "root";
$pq = "root";
$dbname = "cadastros";

try{
    $conn = new PDO("mysql:host$host;dbname=$dbname",$user,$pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die($e->getMessage());
}

include "C001.php";
$db = new C001($conn);


?>