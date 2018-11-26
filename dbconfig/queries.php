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
//var_dump(getPImage()['0']);

function getSImage(){
    global $conn;
    $stmt=$conn->query('select image from string');
    return $stmt->fetchAll(PDO::FETCH_COLUMN,0);
}
function getPName(){
    global $conn;
    $stmt=$conn->query('select name from percussion');
    return $stmt->fetchAll(PDO::FETCH_COLUMN,0);
}
function getNPName(){
    global $conn;
    $stmt=$conn->query('select name from non_percussion');
    return $stmt->fetchAll(PDO::FETCH_COLUMN,0);
}

function getSName(){
    global $conn;
    $stmt=$conn->query('select name from string');
    return $stmt->fetchAll(PDO::FETCH_COLUMN,0);
}

function getPDescription(){
    global $conn;
    $stmt=$conn->query('select description from percussion');
    return $stmt->fetchAll(PDO::FETCH_COLUMN,0);
}
function getNPDescription(){
    global $conn;
    $stmt=$conn->query('select description from non_percussion');
    return $stmt->fetchAll(PDO::FETCH_COLUMN,0);
}

function getSDescription(){
    global $conn;
    $stmt=$conn->query('select description from string');
    return $stmt->fetchAll(PDO::FETCH_COLUMN,0);
}


function getPprice(){
    global $conn;
    $stmt=$conn->query('select price from percussion');
    return $stmt->fetchAll(PDO::FETCH_COLUMN,0);
}
function getNPprice(){
    global $conn;
    $stmt=$conn->query('select price from non_percussion');
    return $stmt->fetchAll(PDO::FETCH_COLUMN,0);
}

function getSprice(){
    global $conn;
    $stmt=$conn->query('select price from string');
    return $stmt->fetchAll(PDO::FETCH_COLUMN,0);
}

function getPCount(){
    global $conn;
    $stmt=$conn->query('select * from percussion');
    return $stmt->rowCount();
}


function getNPCount()
{
    global $conn;
    $stmt = $conn->query('select * from non_percussion');
    return $stmt->rowCount();
}

function getSCount(){
    global $conn;
    $stmt=$conn->query('select * from string ');
    return $stmt->rowCount();
}

function getPCart(){
    global $conn;
    $stmt=$conn->query('select p.name,p.price,o.quantity,o.totalamt,o.address from orders o,percussion p where o.product_id=p.percussion_id');
    return $stmt->fetchAll();
}

//var_dump(getPCart());