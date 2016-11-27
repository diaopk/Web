<!DOCTYPE html>
<html>
	<head>
		<title>Feedback</title>
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
				if(empty($_POST['message'])){
					$error[] = 'You forgot your message';
				} else {
					$message = trim($_POST['message']);
				}
				
				if(empty($error)){
					
					$query = "INSERT INTO feedback 
					(fn,ln,mobile,email,message,date)
					VALUES
					('$fn','$ln','$mobile','$email','$message',NOW())";
					$result = @mysqli_query($db_connection,$query);
					
					if(mysqli_affected_rows($db_connection) == 1){
						echo '<div class="login-box">
								<h1 class="msg">Thank your feedback</h1>
							</div>';
						header("refresh:3;url='index.php'");
					} else {
						echo '<div class="login-box">
								<h2 class="msg">Sorry Please try again</h2>
							</div>';
						header("refresh:3;url='index.php#section5'");
					}
				} else {
					echo '<div class="login-box">
						<p class="msg">The following error(s) occurred:</p>';
						foreach($error as $msg){
							echo '<p class="msg">'.- $msg.'</p>';
						}
					echo '</div>';
				}
				mysqli_close($db_connection);
			} else {
				echo '<div class="login-box">
						<p class="msg">Please Go back to submit the feedback form</p>
					</div>';
			}
			$url = "index.php";
			header("refresh:3;url=$url");
			include("includes/footer.html");
			
		?>
		
	</body>
</html>