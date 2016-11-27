<!DOCTYPE html>
<html>
	<head>
		
		<title>Register</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="includes/bootstrap.min.css">
		<link rel="stylesheet" href="includes/style.css">
		
	</head>
	<body>
	
		<?php
		
		include("includes/nav.html");
		
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$error = array();
			
			require('../connect.php');
			// validate data that the user enters
			if(empty($_POST['fn'])){
				$error[] = 'Please enter your first name';
			} else {
				$fn = trim($_POST['fn']);
			}
			if(empty($_POST['ln'])){
				$error[] = 'Please enter your last name';
			} else {
				$ln = trim($_POST['ln']);
			}
			if(empty($_POST['dob'])){
				$error[] = 'Please enter your date of birth';
			} else {
				$dob = trim($_POST['dob']);
			}
			if(empty($_POST['email'])){
				$error[] = 'Please enter your email';
			} else {
				$email = trim($_POST['email']);
			}
			if(empty($_POST['mobile'])){
				$error[] = 'Please enter your mobile number';
			} else {
				$mobile = trim($_POST['mobile']);
			}
			if(!empty($_POST['pass1'])){
				if($_POST['pass1'] != $_POST['pass2']){
					$error[] = 'Your password did not match the confirmed password';
				} else {
				$pass = trim($_POST['pass1']);
				}
			} else {
				$error[] = 'Please enter your password';
			}
			
			if(empty($error)){ //If everything is OK
				
				//Define the query
				$query = "INSERT INTO member 
				(fn,ln,dob,mobile,email,pass,register_date)
				VALUES
				('$fn','$ln','$dob','$mobile','$email',SHA1('$pass'),NOW())";
				$result = @mysqli_query($db_connection,$query);
				
				if(mysqli_affected_rows($db_connection) == 1 && $result){ //If it ran ok
					
					echo '<div class="login-box">
							<h2 class="msg">Thank You!</h2>
							<p class="msg">You are registered successfully</p>
						</div>';
					
					//Head to login page
					$url = "login.php";
					header("refresh:5;url=$url");
					include("includes/footer.html");
					
					//There is no need to display the register form
					exit();
					
				} else { //If it did not run ok
					
					//Debugging message
					echo '<div class="login-box">
							<h2 class="msg">Sorry</h2>
							<p class="msg">Please try again</p>
							<p class="msg">'.mysqli_error($db_connection).'</p> 
						</div>';
						
				}
			} else {
				
				echo '<div class="login-box">
						<p class="msg">The following error(s) occurred:</p>';
						foreach($error as $msg){
							echo '<p class="msg">'.- $msg.'</p>';
						}
				echo '</div>';
				
			}
			
			//Close the datebase connection
			mysqli_close($db_connection);
			
		}
		
		?>
		
		//Display the form
		<div id="register-area">
			<h1>Register</h1>
			<form action="" method="post" class="contact-form" id="register-form">
				<input type="text" name="fn" class="form-control" size="15" maxlength="20" value="<?php if(isset($_POST['fn'])) echo $_POST['fn']; ?>" placeholder="Enter Your First Name" required />
				<input type="text" name="ln" class="form-control" size="15" maxlength="40" value="<?php if(isset($_POST['ln'])) echo $_POST['ln']; ?>" placeholder="Enter Your Last Name" required />
				<input type="date" name="dob" class="form-control" value="<?php if(isset($_POST['dob'])) echo $_POST['dob']; ?>" placeholder="Enter YOur date of birth" required />
				<input type="number" name="mobile" class="form-control" maxlength="20" value="<?php if(isset($_POST['mobile'])) echo $_POST['mobile']; ?>" placeholder="Enter Your mobile no" required />
				<input type="text" name="email" class="form-control" maxlength="60" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Enter Your Email address" required />
				<input type="password" name="pass1" class="form-control" size="15" maxlength="40" value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1']; ?>" placeholder="Your Password" required />
				<input type="password" name="pass2" class="form-control" size="15" maxlength="40" value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2']; ?>" placeholder="Confirm Your Password" required />
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
		
		<?php include ("includes/footer.html"); ?>
		
	</body>
</html>