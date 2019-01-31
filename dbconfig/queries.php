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
    $stmt=$conn->query('call r1');
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
    $cat='percussion';
    $user=$_SESSION['user_id'];
    $stmt=$conn->prepare('select p.name,p.price,o.quantity,o.totalamt,o.address from orders o,percussion p where o.product_id=p.percussion_id and o.category=:cat and o.user_id=:user');
    $stmt->bindParam('cat',$cat);
    $stmt->bindParam('user',$user);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getNPCart(){
    global $conn;
    $cat='non_percussion';
    $user=$_SESSION['user_id'];
    $stmt=$conn->prepare('select np.name,np.price,o.quantity,o.totalamt,o.address from orders o,non_percussion np where o.product_id=np.non_percussion_id and o.category=:cat and o.user_id=:user');
    $stmt->bindParam('cat',$cat);
    $stmt->bindParam('user',$user);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getSCart(){
    global $conn;
    $cat='string';
    $user=$_SESSION['user_id'];
    $stmt=$conn->prepare('select s.name,s.price,o.quantity,o.totalamt,o.address from orders o,string s where o.product_id=s.string_id and o.category=:cat and o.user_id=:user');
    $stmt->bindParam('cat',$cat);
    $stmt->bindParam('user',$user);
    $stmt->execute();
    return $stmt->fetchAll();
}

//var_dump(getSName());