<!DOCTYPE html>
<html>
	<head>
		<title>Membership</title>
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
				require("../connect.php");
				$query = "SELECT * FROM membership ORDER BY id";
				$result = @mysqli_query($db_connection,$query);
				
				if($result){
					echo '<div id="membership-main">
							<h1>Membership</h1>
						<div id="membership-container">';
					while($row = mysqli_fetch_array($result)){
						echo '<div class="membership-row">
								<h2>'.$row[1].'</h2>
								<div class="membership-content">
									<p>Better clubs</p>
									<p>Better Classes</p>
									<p>Better Price</p>
									<p class="price">Price: &euro; '.$row[3].'</p>
									<p class="description">'.$row[2].'.</p>
								</div>
							</div>';
					}
					echo '</div>
						<div id="callback">
							<p>Got a question ? Contact <a href="callback.php">US</a></p>
						</div>
						</div>';
				}
			} else {
				echo '<div class="login-box">
						<h1 class="msg">Please Login</h1>
					</div>';
					$url = "login.php";
					header("refresh:3;url=$url");
			}
			
			include("includes/footer.html");
			
		?>
		
	</body>
</html>