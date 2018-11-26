<!DOCTYPE html>
<html>
<body>
<?php
include 'dbconfig/queries.php';
session_start();
var_dump($_SESSION['username']);
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
include ('head.php');
include('header.php');
include ('content.php');
include ('footer.php');
include ('scripts.php');
?>

</body>
</html>