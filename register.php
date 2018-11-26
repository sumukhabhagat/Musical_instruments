<?php
	require 'dbconfig/config.php';

?>
<!DOCTYPE html>
<html>
<head>
<title>REGISTRATION PAGE</title>
<link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/mdb.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.5.0-web/css/all.css">
</head>
<body background="images/guitargif2.gif">
 
<div id="main-wrapper">
<center><h2>REGISTRATION FORM</h2>
<img src="images/music.jpg" class="music"/>
</center>

<form class="myform" action="register.php" method="post"><br>
<label><b>USERNAME:</b></label><br>
<input name="username" type="text" class="inputvalues" placeholder="Type your Username" required/><br>
    <label><b>Email:</b></label><br>
    <input name="email" type="email" class="inputvalues" placeholder="Type your email" required/><br>
<label><b>PASSWORD:</b></label><br>
<input name="password" type="password" class="inputvalues" placeholder="Type your Password" required/><br>
<label><b>CONFIRM PASSWORD:</b></label><br>
<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm Password" required/><br>
<input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/>
<a href="login.php" class="btn btn-deep-orange"><< Back to Login</a>
</form>
	<?php
		if(isset($_POST['submit_btn']))
		{
			//echo '<script type="text/javascript"> alert("Sign Up button clicked") </script>';
			
			$username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			include 'dbconfig/dbconnect.php';
			
			if($password==$cpassword)
			{
			    $stmt=$conn->prepare("select * from user WHERE username=:user");
			    $stmt->bindParam("user",$username);
			    $stmt->execute();
				if ($stmt->rowCount()>0)
				{
					//there is already a user with the same username
					echo '<script type="text/javascript"> alert("User already exists... Try another username") </script>';
				}
				else
				{
				    $stmt=$conn->prepare("insert into user(username,email,password) values(:username,:email,:password)");
				    $stmt->bindParam("username",$username);
                    $stmt->bindParam("email",$email);
                    $stmt->bindParam("password",md5($password));
                   $rStatus=$stmt->execute();


					
					if($rStatus)
					{
						echo '<script type="text/javascript"> alert("User Registered... Go to Login page") </script>';
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error!") </script>';
					}
				}
			}
			else{
				echo '<script type="text/javascript"> alert("Password and Confirm password does not match") </script>';
			}
		}
	?>
	</div>
</body>
</html>