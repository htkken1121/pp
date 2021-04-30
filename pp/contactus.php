<?php 

// connect DB
include ('templates/db.php');

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

// Close DB Connection
mysqli_close($db);


?>

<html>
<body>
<?php include ('templates/header.php'); ?>


<center><?php include('templates/footer.php'); ?></center>
	
</html>