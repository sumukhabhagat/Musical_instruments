<?php
	require 'dbconfig/config.php';

?>
<!DOCTYPE html>
<html>
<head>
<title>LOGIN PAGE</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body  background="images/g1.jpg">
 
<div id="main-wrapper">
<center><h2> MUSICAL INSTRUMENTS STORE LOGIN FORM</h2>
<img src="images/music.jpg" class="music"/>
</center>

<form class="myform" action="index.php" method="post"><br>
<label><b>USERNAME:</b></label><br>
<input name="username" type="text" class="inputvalues" placeholder="Type your Username" required/><br>
<label><b>PASSWORD:</b></label><br>
<input name="password" type="password" class="inputvalues" placeholder="Type your Password" required/><br>
<input name="login" type="submit" id="login_btn" value="LOGIN"/><br>
<a href="register.php"> <input type="button" id="register_btn" value="REGISTER"/></a>
</form>
	<?php
	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$query= "select * from user WHERE username='$username' AND password='$password'";
		
		$query_run = mysqli_query($con,$query);
		if(mysqli_num_rows($query_run)>0)
		{
			//valid
			$_SESSION['username']= $username;
			header('location:homepage.php');
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