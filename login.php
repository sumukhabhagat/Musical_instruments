<?php
session_start();
	require 'dbconfig/config.php';

?>
<!DOCTYPE html>
<html>
<head>
<title>LOGIN PAGE</title>
<link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/mdb.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.5.0-web/css/all.css">
</head>
<body  background="images/music3.jpg">
 
<div id="main-wrapper">
<center><h2> MUSICAL INSTRUMENTS STORE LOGIN FORM</h2>
<img src="images/music.jpg" class="music"/>
</center>

<form class="myform" action="login.php" method="post"><br>
<label><b>USERNAME:</b></label><br>
<input name="username" type="text" class="inputvalues" placeholder="Type your Username" required/><br>
<label><b>PASSWORD:</b></label><br>
<input name="password" type="password" class="inputvalues" placeholder="Type your Password" required/><br>
<input name="login" type="submit" id="login_btn" value="LOGIN"/><br>
<a href="register.php"> <input type="button" id="register_btn" value="REGISTER"/></a>
</form>
	<?php
    session_start();
	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		include 'dbconfig/dbconnect.php';

		$stmt=$conn->prepare("select * from user WHERE username=:username AND password=:password");
		$stmt->bindParam("username",$username);
        $stmt->bindParam("password",md5($password));
        $stmt->execute();



        if($stmt->rowCount()>0)
		{
			//valid
			$_SESSION['username']= $username;
			header('location:index.php');
		}
		else
		{
			//invalid
			echo '<script type="text/javascript"> alert("Invalid credentials") </script>';
		}
	}
	
	?>

</div>
</body>
</html>