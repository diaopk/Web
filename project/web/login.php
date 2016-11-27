<!DOCTYPE html>
<html>
	<head>
		
		<title>Login</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="includes/bootstrap.min.css">
		<link rel="stylesheet" href="includes/style.css">
		
	</head>
	<body>
	
		<?php /* Validate the submitted data from user here */
		
			include("includes/nav.html");
			
			if($_SERVER['REQUEST_METHOD']=='POST'){
				
				$error = array();
				
				require('../connect.php');
				
				if(empty($_POST['email'])){
					
					$error[] = "Please Enter Your Email or Username";
				
				} else {
					
					$email = trim($_POST['email']);
				
				}
				if(empty($_POST['pass'])){
				
					$error[] = "Please Enter Your Password";
				
				} else {
				
					$pass = trim($_POST['pass']);
				
				}
				
				if(empty($error)){
				
					if($email == 'admin' && $pass == 'password'){ // admin login
						$query_admin = "SELECT * FROM admin WHERE name = '$email' AND pass = SHA1('$pass')";
						$result_admin = @mysqli_query($db_connection,$query_admin);
							
						if(mysqli_num_rows($result_admin)){
							$row = mysqli_fetch_array($result_admin);
							$_SESSION['email'] = $row['name'];
								
							echo "<div class='login-box'>
									<h2 class='msg'>Logged in</h2>
									<p class='msg'>Welcome ".$_SESSION['email']."</p>
								</div>";
									
							$url = "index.php";
							header("refresh:3;url=$url");
								
						} else {
							
							echo "<div class='login-box'>
									<h2 class='msg'>Sorry!</h2>
									<p class='msg'>The Admin Name and Password are incorrect!</p>
								</div>";
							
							$url = $_SERVER['PHP_SELF'];
							
							header("refresh:3;url='login.php'");
						
						} // End of admin login 
					
					} else { // user login
					
						$query = "SELECT * FROM member
						WHERE email = '$email' AND pass = SHA1('$pass')";
						
						$result = @mysqli_query($db_connection,$query);

						if(mysqli_num_rows($result)){
						
							//set cookie
							$row = mysqli_fetch_array($result);
							$_SESSION['email'] = $row['email'];
							$_SESSION['name'] = $row['fn'].' '.$row['ln'];
							setcookie("email",$_SESSION['email'],time() + 3600*3);
									
							echo "<div class='login-box'>
									<h2 class='msg'>Logged in</h2>
									<p class='msg'>Welcome ".$_SESSION['name']."</p>
								</div>";
							
							$url = "index.php";
							
							header("refresh:3;url=$url");
						
						} else {
							
							echo "<div class='login-box'>
									<h2 class='msg'>Sorry!</h2>
									<p class='msg'>The Email and Password are incorrect!</p>
								</div>";
							
							$url = $url = $_SERVER['PHP_SELF'];
							
							header("refresh:3;url=$url");
						
						} // End of user login
						
					}
					
				} else {
					
					echo "<div class='login-box'>
							<h2 id='msg_sorry'>Sorry!</h2>
							<p class='msg'>The following error(s) occurred</p>";
						
						foreach($error as $msg){
						
							echo '<p class="msg">'.- $msg.'</p>';
						
						}
					
					echo "</div>";
					
					mysqli_close($db_connection);
					
					$url = $_SERVER['PHP_SELF'];
					
					header("refresh:5;url=$url");
				}
				
				include ("includes/footer.html");
				
				exit();
			}
		
		?>
		
		<div id="login-area">
			<div class="col-lg-13">
				<h1>Login</h1>
				<form action="" method="post" class="contact-form" id="login-form">
					<input type="text" name="email" class="form-control" id="login-email" maxlength=60 placeholder="Your Email" required />
					<input type="password" name="pass" class="form-control" id="login-pass" maxlength=40 placeholder="Your Password" required />
					<button type="submit" class="btn btn-default">Login</button>
				</form>
				<div class="additional">
					<p>Not a member yet ? <a href="register.php"> Sign Up</a></p>
					<p>Forgot a <a href="getback.php">password?</a></p>
				</div>
			</div>
		</div>
		
		<?php include("includes/footer.html"); ?>
		
	</body>
</html>