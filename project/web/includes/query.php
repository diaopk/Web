<?php
	
	require("../connect.php");
	$query = "select f.message, CONCAT(f.fn, ', ', f.ln) AS name, DATE_FORMAT(f.date, '%M %d,%Y') AS date from testimonies as t
			join feedback as f
			on t.feedback_id = f.id
			where t.id = 1";
	$result = @mysqli_query($db_connection,$query);
	$row = mysqli_fetch_array($result);
	mysqli_close($db_connection);
	
?>