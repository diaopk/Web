<!DOCTYPE html>
<html>
	<head>
		<title>Class Table</title>
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
				
				echo '<div id="class-main">
						<div class="book-class">';
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
								if(empty($_POST['class'])){
									$error[] = 'Please select your class';
								} else {
									$class = trim($_POST['class']);
								}
								if(empty($_POST['time'])){
									$error[] = 'Please Select Your time';
								} else {
									$time = trim($_POST['time']);
								}
								
								if(empty($error)){
									$q_m = "SELECT id FROM member WHERE email = '$email'";
									$q_c = "SELECT class_id FROM class WHERE title = '$class'";
									$q_t = "SELECT time FROM timetable WHERE time = '$time'";
									$r_m = @mysqli_query($db_connection,$q_m);
									$r_c = @mysqli_query($db_connection,$q_c);
									$r_t = @mysqli_query($db_connection,$q_t);
									
									if(mysqli_num_rows($r_m) == 1 && mysqli_num_rows($r_c) && mysqli_num_rows($r_t)){
										$row_m = mysqli_fetch_array($r_m);
										$row_c = mysqli_fetch_array($r_c);
										$row_t = mysqli_fetch_array($r_t);
										
										$member_id = $row_m['id'];
										$class_id = $row_c['class_id'];
										$time = $row_t['time'];
										
										$query = "INSERT INTO class_booking(member_id,time,class_id)
										VALUES 
										('$member_id','$time','$class_id')";
										$result = @mysqli_query($db_connection,$query);
										if(mysqli_affected_rows($db_connection) == 1){
											$q = "SELECT * FROM class WHERE class_id = '$class_id'";
											$r = mysqli_query($db_connection,$q);
											$row_dis = mysqli_fetch_array($r);
											
											echo '<div class="login-box">
													<h1>Thank You!</h1>
													<h2 class="msg">You have booked class  '.$row_dis['title'].'</h2>
												</div>';
											header("refresh:3;url='index.php'");
										} else {
											echo '<div class="login-box">
													<h2 class="msg">Sorry</h2>
													<p class="msg">Please try again</p>
												</div>';
											header("refresh:3;url='class.php'");
										}
									} else {
										echo '<div class="login-box">
												<h1>Please Correct Your information</h1>
											</div>';
										header("refresh:3;url='class.php'");
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
								
							} elseif (isset($_GET['book'])){
								echo '<h2>Booking Form</h2>
									<form action="" method="post" class="contact-form" id="book-form">
										<input name="fn" type="text" class="form-control" id="name" maxlength="20" value="';if(isset($_POST['fn'])) {echo $_POST['fn'];} echo '" placeholder="Your first name" required />
										<input name="ln" type="text" class="form-control" id="name" maxlength="40" value="';if(isset($_POST['ln'])) {echo $_POST['ln'];} echo'" placeholder="Your last name" required />
										<input name="mobile" type="number" class="form-control" maxlength="20" value="';if(isset($_POST['mobile'])) {echo $_POST['mobile'];} echo'" placeholder="Your mobile no" requried />
										<input type="email" name="email" class="form-control" id="mail" maxlength="60" value="';if(isset($_POST['email'])) {echo $_POST['email'];} echo'" placeholder="Email" required />
										<p>Select Your class<br/>
										<input type="radio" name="class" value="Yoga" checked="checked" /> Yoga
										<input type="radio" name="class" value="Spin" /> Spin
										<input type="radio" name="class" value="Tone" /> Tone
										<input type="radio" name="class" value="Zumba" /> Zumba</p>
										<select name="time" class="form-control">
											<option value="mon from 6.30am to 9.30am">Mon from 6.30am - 9.30am</option>
											<option value="mon from 3.30pm to 6.30pm">Mon from 3.30pm - 6.30pm</option>
											<option value="mon from 6.30pm to 9.30pm">Mon from 6.30pm - 9.30pm</option>
											<option value="tue from 9.30am to 0.30pm">Tue from 9.30am - 0.30pm</option>
											<option value="tue from 3.30pm to 6.30pm">Tue from 3.30pm - 6.30pm</option>
											<option value="tue from 9.30pm to 11.00pm">Tue from 9.30pm - 11.00pm</option>
											<option value="wed from 6.30am to 9.30am">Wed from 6.30am - 9.30am</option>
											<option value="wed from 3.30pm to 6.30pm">Wed from 3.30pm - 6.30pm</option>
											<option value="wed from 6.30pm to 9.30pm">Wed from 6.30pm - 9.30pm</option>
											<option value="thu from 6.30am to 9.30am">Thu from 6.30am - 9.30am</option>
											<option value="thu from 9.30am to 0.30pm">Thu from 9.30am - 0.30pm</option>
											<option value="thu from 3.30pm to 6.30pm">Thu from 3.30pm - 6.30pm</option>
											<option value="thu from 6.30pm to 9.30pm">Thu from 6.30pm - 9.30pm</option>
											<option value="fri from 1.30pm to 3.30pm">Fri from 1.30pm - 3.30pm</option>
											<option value="fri from 6.30pm to 9.30pm">Fri from 6.30pm - 9.30pm</option>
											<option value="fri from 9.30pm to 11.00pm">Fri from 9.30pm - 11.00pm</option>
											<option value="sat from 6.30am to 9.30am">Sat from 6.30am - 9.30am</option>
											<option value="sat from 3.30pm to 6.30pm">Sat from 3.30pm - 6.30pm</option>
											<option value="sat from 6.30pm to 9.30pm">Sat from 6.30pm - 9.30pm</option>
											<option value="sat from 9.30pm to 11.00pm">Sat from 9.30pm - 11.00pm</option>
										</select>
										<button type="submit" name="" class="btn btn-default">Submit</button>
									</form>';
							} else {
								echo '<form action="" method="get" class="contact-form" id="display-form">
										<button type="submit" name="book" class="btn btn-default">Book class</button>
									</form>';
							}
						echo '<div id="class-table">
								<h1>Timetable</h1>
								<table id="table-content">
									<tr class="first-row">
										<td></td>
										<td>Mon</td>
										<td>Tue</td>
										<td>Wed</td>
										<td>Thu</td>
										<td>Fri</td>
										<td>Sat</td>
									</tr>
									<tr>
										<td>6.30 - 9.30</td>
										<td>Yoga</td>
										<td></td>
										<td>Yoga</td>
										<td>Yoga</td>
										<td></td>
										<td>Yoga</td>
									</tr>
									<tr class="even">
										<td>9.30 - 12.30</td>
										<td></td>
										<td>Zumba</td>
										<td></td>
										<td>Zumba</td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>12.30 - 3.30</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td>Spin</td>
										<td></td>
									</tr>
									<tr class="even">
										<td>3.30 - 6.30</td>
										<td>Spin</td>
										<td>Spin</td>
										<td>Spin</td>
										<td>Zumba</td>
										<td></td>
										<td>Zumba</td>
									</tr>
									<tr>
										<td>6.30 - 9.30</td>
										<td>Tone</td>
										<td></td>
										<td>Zumba</td>
										<td>Tone</td>
										<td>Zumba</td>
										<td>Tone</td>
									</tr>
									<tr class="even">
										<td>9.30 - 11.00</td>
										<td></td>
										<td>Yoga</td>
										<td></td>
										<td></td>
										<td>Yoga</td>
										<td>Yoga</td>
									</tr>
								</table>
							</div>
						</div>
					</div>';
			} else {
				echo '<div class="login-box">
						<h1>Please Login</h1>
					</div>';
				header("refresh:3;url='login.php'");
			}
			include("includes/footer.html");
		
		?>
		
	</body>
</html>