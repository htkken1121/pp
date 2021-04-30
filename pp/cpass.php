<?php 

// connect DB
include ('templates/db.php');


if (!isset($_SESSION['username'])) {
    header('location:login.php');
}


$username = $password1 = '';

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/error.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php include ('templates/header.php'); ?>


 <center><h2>Change Password</h2></center>
   <form action="cpass.php" method="POST" >
		<!-- display validation error -->
		 <?php include('errors.php'); ?>
			<label>User Name: </label><br>
			<input type="text" name="username" value="<?php echo htmlspecialchars($_SESSION['username']); ?>"><br>
			<label>Old Password: </label><br>
			<input type="password" name="old_pass" id="old_pass"><br>
			<label>New Password: </label><br>
			<input type="password" name="new_pass" id="new_pass"><br>
			<label>Verify Password: </label><br>
			<input type="password" name="renew_pass" id="renew_pass"><br><br>
							
			<button type="submit" name="submit" class="btn btn btn-success">Submit</button><br>
		</div>
  </form>
</div>

<center><?php include('templates/footer.php'); ?></center>
	
</html>