<!DOCTYPE html>
<html>
<body>
<?php
session_start();
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