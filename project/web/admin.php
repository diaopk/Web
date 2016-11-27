<?php
	//Check the valid access
	//SESSION_START();
	include("includes/nav.html");
	if(isset($_SESSION['email']) && $_SESSION['email'] == 'admin') {
?>
<?php //if access validly show below
	
	require("../connect.php");
	
	/* User input */
	//determine the number of records per page
	if(isset($_GET['display']) && is_numeric($_GET['display'])){
		$display = $_GET['display'];
	} else {
		$display = 5;
	}
	
	//determine the current page
	if(isset($_GET['c_page']) && is_numeric($_GET['c_page'])){
		$c_page = $_GET['c_page'];
	} else {
		$c_page = 1;
	}
	/* User input End */
	
	//Determine the first record of the page
	if($c_page > 1) {
		$fir_rcd = ($c_page - 1) * $display;
	} else {
		$fir_rcd = 0;
	}
	
	//Making the sortable display
	//default is by registered date
	$sort = (isset($_GET['sort'])) ? 
	$_GET['sort'] : 'rd';
	
	//Detemine the sorting order
	switch($sort) {
		case 'fn':
			$order_by = "fn ASC";
			break;
		case 'ln':
			$order_by = "ln ASC";
			break;
		case 'dob':
			$order_by = "dob ASC";
			break;
		case 'rd':
			$order_by = "register_date ASC";
			break;
		default:
			$order_by = "register_date ASC";
			$sort = 'rd';
			break;
	}
	
	//define queries
	$query_member = "SELECT * FROM member ORDER BY $order_by LIMIT $fir_rcd, $display";
	$query_feedback = "SELECT * FROM feedback ORDER BY date";
	$query_call = "SELECT * FROM callback ORDER BY id";
	$query_booking = "select m.fn, m.ln, m.mobile, m.email, c.title, t.time
					from class_booking as b
					join member as m on b.member_id = m.id	
					join class as c using(class_id)
					join timetable as t using(time)
					order by m.fn desc;";
	$query_m_num = "SELECT COUNT(id) FROM member";
					
	$r_member = @mysqli_query($db_connection,$query_member);
	$r_feedback = @mysqli_query($db_connection,$query_feedback);
	$r_call = @mysqli_query($db_connection,$query_call);
	$r_booking = @mysqli_query($db_connection,$query_booking);
	$r_m_num = @mysqli_query($db_connection,$query_m_num);
	
	$row_m_num = @mysqli_fetch_array($r_m_num,MYSQL_NUM);
	
	//Calculating the number of records
	$records = $row_m_num[0];
	
	//Determine the number of pages
	if($records > $display){ //More than one page
		$pages = ceil($records/$display);
	} else {
		$pages = 1;
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Section</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="includes/bootstrap.min.css">
		<link rel="stylesheet" href="includes/style.css">
		
	</head>
	<body>
		
		<div id="admin-main">
			<div id="admin-content">
		
		<?php
		
			//publish the testimony
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$feedback_id = trim($_POST['feedback_id']);
				$query_publish = "UPDATE testimonies SET feedback_id = '$feedback_id'";
				$result_publish = @mysqli_query($db_connection,$query_publish);
						
				if(mysqli_affected_rows($db_connection) == 1){
					echo '<div class="login-box">
							<h1 class="msg">Selected feedback has been published!</h1>
						</div>';
					header("refresh:3;url='index.php#section4'");
				} else {
					echo '<div class="login-box">
						<h2 class="msg">Sorry Please try again</h2>
						</div>';
				}
			}
		
			//Display records
			if($r_member && $r_feedback && $r_booking && $r_call){
					
					//Members
					echo '<div id="members">
							<h1>Registered Members</h1>
							<table id="member-list">
								<tr class="first-row">
									<td><a href="admin.php?sort=fn">First name</a></td>
									<td><a href="admin.php?sort=ln">Last name</a></td>
									<td><a href="admin.php?sort=dob">Date of birth</a></td>
									<td>Mobile</td>
									<td>Email</td>
									<td><a href="admin.php?sort=rd">Registered date</a></td>
								</tr>';
					
					while($row_m = mysqli_fetch_array($r_member)){ //warning: query to display records and calculate the records have to be splited!
						echo '<tr>
								<td>'.$row_m[1].'</td>
								<td>'.$row_m[2].'</td>
								<td>'.$row_m[3].'</td>
								<td>'.$row_m[4].'</td>
								<td>'.$row_m[5].'</td>
								<td>'.$row_m[7].'</td>
							</tr>';
					}
					
					echo '</table><div class="paging-mian">';
					
					//Previous page link
					if($c_page != 1 && $pages >1) {
						echo '<a class="paging" href="admin.php?c_page='.($c_page - 1).'&display='.$display.'">Previous</a>  ';
					}
					
					//paginating the query results
					for($i = 1; $i <= $pages; $i++) {
						
						if($i != $c_page) {
							echo '<a class="paging" href="admin.php?c_page='.$i.'&display='.$display.'">'.$i.'</a>';
						} else {
							echo '<span id="c-paging">'.$i.'</span> ';
						}
						
					} //End of the FOR loop
					
					//Next page link
					if($c_page != $pages) {
						echo '<a class="paging" href="admin.php?c_page='.($c_page + 1).'&display='.$display.'">Next</a>';
					}
					
					//Feedback
					echo '</div></div>
						<div id="testimony">
							<h1>Feedback</h1>
							<table id="feedback-list">
								<tr class="first-row">
									<td>Publish</td>
									<td>first name</td>
									<td>last name</td>
									<td>mobile</td>
									<td>email</td>
									<td>message</td>
									<td>date</td>
								</tr>';
						
					while($row_f = mysqli_fetch_array($r_feedback)){
						echo '<tr>
								<td>
									<form action="" method="post" id="publish">
										<input type="hidden" name="feedback_id" value="'.$row_f[0].'" />
										<button type="submit" class="btn btn-default">Select</button>
									</form>
								</td>
								<td>'.$row_f[1].'</td>
								<td>'.$row_f[2].'</td>
								<td>'.$row_f[3].'</td>
								<td>'.$row_f[4].'</td>
								<td>'.$row_f[5].'</td>
								<td>'.$row_f[6].'</td>
							</tr>';
					}
					echo '</table>
						</div>
						<div id="questions">
							<h1>Members questions</h1>
							<table id="member-list">
								<tr class="first-row">
									<td>first name</td>
									<td>last name</td>
									<td>mobile</td>
									<td>email</td>
									<td>Question</td>
								</tr>';
					while($row_c = mysqli_fetch_array($r_call)){
						echo '<tr>
								<td>'.$row_c[1].'</td>
								<td>'.$row_c[2].'</td>
								<td>'.$row_c[3].'</td>
								<td>'.$row_c[4].'</td>
								<td>'.$row_c[5].'</td>
							</tr>';
					}
					echo '</table>
						</div>
						<div id="booking">
							<h1>Booking List</h1>
							<table id="booking-list">
								<tr class="first-row">
									<td>first name</td>
									<td>last name</td>
									<td>mobile</td>
									<td>email</td>
									<td>class</td>
									<td>time</td>
								</tr>';
					while($row_b = mysqli_fetch_array($r_booking)){
						echo '<tr>
								<td>'.$row_b[0].'</td>
								<td>'.$row_b[1].'</td>
								<td>'.$row_b[2].'</td>
								<td>'.$row_b[3].'</td>
								<td>'.$row_b[4].'</td>
								<td>'.$row_b[5].'</td>
							</tr>';
					}
					echo '</table>
						</div>';
						
					
			}
			
			mysqli_free_result($r_feedback);
			mysqli_free_result($r_booking);
			mysqli_close($db_connection);
			
		?>
		
			</div>
		</div>
		
	</body>
</html>

<?php include("includes/footer.html"); ?>
<?php } else { echo 'This site is accessed invalidly'; } ?>