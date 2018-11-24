<?php
require 'dbconnect.php';

function getPImage(){
    global $conn;
    $stmt=$conn->query('select image from percussion');
    return $stmt->fetchAll(PDO::FETCH_COLUMN,0);
}
function getNPImage(){
    global $conn;
    $stmt=$conn->query('select image from non_percussion');
    return $stmt->fetchAll(PDO::FETCH_COLUMN,0);
}
//var_dump(getImageName());

function getSImage(){
    global $conn;
    $stmt=$conn->query('select image from string');
    return $stmt->fetchAll(PDO::FETCH_COLUMN,0);
}
//var_dump(getImageName());