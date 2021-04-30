<?php 

include ('templates/db.php'); 

?>

<!DOCTYPE html>
<html>
<head>
<TITLE>Employees & Services Management System</TITLE>
<link rel="stylesheet" href="css\style.css" media="screen">
<link rel="stylesheet" href="framework\bootstrap\css\bootstrap.min.css" type="text/css" media="screen">
</head>
<body>
<div class="header">
<p>Employees & Service Management System</p>
</div>

<br><br>
<form action="login.php" method="POST" >
		<?php include('errors.php'); ?> 
		<center><img src="img/login.png"></center>
		<div class="input-group">
			<label>Username</label>
			<input type="text" autofocus="autofocus" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn btn-info">Login</button><p>&nbsp</p>
			<button type="reset" name="reset" class="btn btn-info">Reset</button>
		</div>
	 </form>
	<br>
<?php include('templates\footer.php') ?>	
</body>   