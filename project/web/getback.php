<!DOCTYPE html>
<html>
	<head>
		
		<title>Get Back Password</title>
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
					require('../connect.php');
					$error = array();
					
					//Validate the submitted records
					if(empty($_POST['email'])){
						$error[] = 'You forget enter your email';
					} else {
						$email = trim($_POST['email']);
					}
					if(!empty($_POST['pass1'])){
						if($_POST['pass1'] != $_POST['pass2']){
							$error[] = 'Your password did not match the confirmed password';
						} else {
							$pass = trim($_POST['pass1']);
						}
					} else {
						$error[] = 'You forget enter your password';
					}
					
					if(empty($error)){ //If everything is ok
						
							$query_e = "SELECT * FROM member WHERE email = '$email'";
							$result_e = @mysqli_query($db_connection,$query_e);
							
							if($result_e){ //Valid User exist
							
								$query_pass = "UPDATE member SET pass = SHA1('$pass') WHERE email = '$email'";
								$result_pss = @mysqli_query($db_connection,$query_pass);
								
								if(mysqli_affected_rows($db_connection) == 1){ //If updateing query ran ok
									echo '<div class="login-box">
											<p class="msg">Your password has been changed</p>
										</div>';
		
									$url = "login.php";
									header("refresh:3;url=$url");
								} else {
									echo '<div class="login-box">
											<h2 class="msg">Sorry</h2>
											<p class="msg">Please try again</p>
											<p class="msg">'.mysqli_error($db_connection).'
										</div>';
								}
							} else {
								echo '<div class="login-box">
										<p class="msg">The Email address is incorrect</p>
										<p class="msg">'.mysqli_error($db_connection).'</p>
									</div>';
							}
					} else {
						echo '<div class="login-box">
								<h2 class="msg">Sorry</h2>
							<?php 
								foreach($error as $msg){
									echo <p class="msg">'.- $msg.'</p>;
								}
							?>
							echo </div>';
					}
					mysqli_close($db_connection);
					include ("includes/footer.html");
					exit();
				}
				
		?>
		
		<div id="password-main">
			<h1>Change Your Password</h1>
			<form action="" method="POST" class="contact-form" id="password-form">
				<input type="email" name="email" class="form-control" maxlength = "60" <?php if(isset($_POST['email'])) echo $_POST['email']; ?> placeholder = "Please enter your Email" required />
				<input type="password" name="pass1" class="form-control" maxlength="40" placeholder="Enter your new password" required />
				<input type="password" name="pass2" class="form-control" maxlength="40" placeholder="Confirm your new password" required />
				<button class="btn btn-default">Change Password</button>
			</form>
		</div>
		
		<?php include ("includes/footer.html"); ?>
		
	</body>
</html>