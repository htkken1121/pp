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
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href = "css/queryTables.css" />
	<link rel="stylesheet" type="text/css" href="css/print.css" media="print">
	<script type="text/javascript" src="framework/js/function.js"></script>
</head>
<body>
<?php include ('templates/header.php'); ?>

<html lang = "eng">
	<body>
	<form action="field_att.php" method="POST" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" name="inputToSearch" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
   
	  <table> 
	   <tr>
		<th>Employee ID</th>
		<th>Employee Name</th>
		<th>Date</th>
		<th>Time</th>
	   </tr>

	 <?php while ($row = mysqli_fetch_array($search_result)): ?>
                <tr>
                    <td><?php echo $row['empid'] ?></td>
                    <td><?php echo $row['empname'] ?></td>
                    <td><?php echo $row['Date'] ?></td>
                    <td><?php echo $row['Time'] ?></td>

                </tr>
                <?php endwhile; ?>
		<br />

	  </table>
	</form>
	    <br />
		  
		
	
<?php include('templates/footer.php'); ?>
	
</html>