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


  <center><h2>Staff Login Registration</h2></center>
   <form action="reg.php" method="POST" >
		<!-- display validation error -->
		 <?php include('errors.php'); ?>
			<label>User Name: </label><br>
			<input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>"><br>
			<label>Password: </label><br>
			<input type="password" name="password1"><br>
			<label>Confirm Password: </label><br>
			<input type="password" name="password2"><br><br>
			User Type: <select name="type">
   			<option value="User">User</option>
  			<option value="Admin">Admin</option>
  			<option value="Technician">Technician</option>
  			<option value="IT">IT</option>
  			</select><br><br>			
			<button type="submit" name="register" class="btn btn btn-success">Register</button><br>
		</div>
  </form>
</div>
<center><?php include('templates/footer.php'); ?></center>
	
</html>