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
				if(empty($_POST['question'])){
					$error[] = 'You forgot your message';
				} else {
					$question = trim($_POST['question']);
				}
				
				if(empty($error)){
					
					$query = "INSERT INTO callback(fn,ln,mobile,email,question) 
					VALUES ('$fn','$ln','$mobile','$email','$question')";
					$result = @mysqli_query($db_connection,$query);
					
					if(mysqli_affected_rows($db_connection) == 1){
						echo '<div class="login-box">
								<h1 class="msg">Question has been submitted</h1>
							</div>';
						header("refresh:3;url='index.php'");
					} else {
						echo '<div class="login-box">
								<h2 class="msg">Sorry Please try again</h2>
							</div>';
						header("refresh:3;url='callback.php'");
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
				include("includes/footer.html");
				exit();
			}
			
		?>
		
		<div class="col-lg-12" id="callback-area">
			<h1>Describe Your question</h1>
			<form action="" method="POST" class="contact-form" id="callback-form">
				<div class="col-sm-6 contact-form-left">
					<div class="form-group">
						<input name="fn" type="text" class="form-control" id="name" maxlength="20" value="<?php if(isset($_POST['fn'])) echo $_POST['fn']; ?>" placeholder="Your first name" required />
						<input name="ln" type="text" class="form-control" id="name" maxlength="40" value="<?php if(isset($_POST['ln'])) echo $_POST['ln']; ?>" placeholder="Your last name" required />
						<input name="mobile" type="number" class="form-control" maxlength="20" value="<?php if(isset($_POST['mobile'])) echo $_POST['mobile']; ?>" placeholder="Your mobile no" requried />
						<input type="email" name="email" class="form-control" id="mail" maxlength="60" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Email" required />
					</div>
				</div>
				<div class="col-sm-6 contact-form-right">
					<div class="form-group">
						<textarea name="question" rows="6" class="form-control"  maxlength="500" placeholder="Your message here..." required ></textarea>
						<button type="submit" class="btn btn-default">Send</button>
					</div>
				</div>                        
			</form>    
		</div>
		
		<?php include("includes/footer.html"); ?>
		
	</body>
</html>