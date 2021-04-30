<?php 

include ('templates/db.php');

?>

<!DOCTYPE html>
<html>
<head>
<title>Employees & Service Management System</title>
<link rel="stylesheet" href="css\style.css" media="screen">
<link rel="stylesheet" href="framework\bootstrap\css\bootstrap.min.css" type="text/css" media="screen">
</head>
<body>
<div class="header">
<p>Employees & Service Management System</p>
</div>

<br><br>
<form action="time.php" method="POST" >
		<?php include('errors.php'); ?> 
		<center><h3>Attendance Login</h3></center>
		<div class="input-group">
			<label>Please Input Employee Number</label>
			<input type="text" autofocus="autofocus" name="empid">
		</div>
		<br>
		<div class="input-group">
			<button type="submit" name="att_login" class="btn btn-info">Login</button><p>&nbsp</p>
		</div>
	 </form>
	<br>
<?php include('templates\footer.php') ?>	
</body>   