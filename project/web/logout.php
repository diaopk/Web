<!doctype html>
<html>
	
	<head>
		<title>Log Out</title>
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
			
			if(isset($_SESSION['email'])){
				session_unset();
				session_destroy();
				
				echo "<div class='login-box'>
						<h2 class='msg'>You have been logged out successfully</h2>
					</div>";
				$url = "index.php";
				header("refresh:3;url=$url");
			}
			
			include ("includes/footer.html");
			
		?>
	
	</body>
	
</html>