<?php 

// connect DB
include ('./templates/db.php');
$query = "SELECT emp.empid, emp.empname, DATE(time_in.att_in) as Date, TIME(time_in.att_in) as Time FROM emp inner JOIN time_in on emp.empid = time_in.empid ORDER BY DATE desc";
$result = mysqli_query($db, $query);
//$output ='';


if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
// Close DB Connection
//mysqli_close($db);

?>

<html lang="en">
<head>
	<meta charset="UTF-8">
 	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href = "css/queryTables.css" />
	<link rel="stylesheet" type="text/css" href="css/print.css" media="print">
	<script type="text/javascript" src="framework/js/function.js"></script>
</head>
<body class="bg-light info">
<?php include ('.\templates\header.php'); ?>

    <form action=".\templates\db.php" method="POST" class="form-inline my-2 my-lg-0">
      <input class="btn btn-secondary btn-sm" type="submit" name="exportAttToCSV" value="Export Excel" title="Export to Excel" >
      
	  <table class="table"> 
	   <tr>
		<th>Employee ID</th>
		<th>Employee Name</th>
		<th>Date</th>
		<th>Time</th>
	   </tr>

	 <?php 
	     while ($row = mysqli_fetch_assoc($result)) 
			{
			     $EmpID = $row['empid'];
                 $EmpName = $row['empname'];
                 $Date = $row['Date'];
                 $Time = $row['Time'];
            ?>
				<tr>
					<td><?php echo $row['empid']; ?></td>
                    <td><?php echo $row['empname']; ?></td>
                    <td><?php echo $row['Date']; ?></td>
                    <td><?php echo $row['Time']; ?></td>
				</tr>	

			<?php 	
			}
		    ?>	

	  </table>
	</form>
	    <br />
		  <div class="text-center">
		     <button onclick="window.print();" class="btn btn-info btn-lg" id="print-btn">Print</button>
	      </div>
		 <br />
	
<?php include('templates/footer.php'); ?>
</body>	
</html>