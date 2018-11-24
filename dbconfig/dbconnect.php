<?php
require 'config.php';
try{
    $conn = new PDO("mysql:dbname=".$db.";host=".$host.";charset=utf8",$user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo "Connection Failed : ".$e->getMessage();
    die;
}