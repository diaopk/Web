<!DOCTYPE html>
<html>
	<head>
		
		<title>Members' Feedback</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="includes/bootstrap.min.css">
		<link rel="stylesheet" href="includes/style.css">
		
	</head>
	<body>
	
		<?php include("includes/nav.html"); ?>

		<div id="readmore-main">
			<h1>Members' Feedback</h1>
			<div id="list-testimonies">
				
				<?php
					require("../connect.php");
					$query = "SELECT message,CONCAT(fn, ', ', ln) AS name, DATE_FORMAT(date, '%M %d,%Y') AS date FROM feedback ORDER BY date ASC";
					$result = @mysqli_query($db_connection,$query);
					
					if($result){
						while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
							echo '<div class="feedback-row">
									<p class="feedback-content">" '.$row['message'].' "</p>
									<p class="feedback-member">- '.$row['name'].'  <span class="feedback-date">'.$row['date'].'</span></p>
								</div>';	
						}
						mysqli_free_result($result);
					}
					mysqli_close($db_connection);
				?>
				
			</div>
		</div>
		
		<?php include("includes/footer.html"); ?>
		
	</body>
</html>