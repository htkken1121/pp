<?php 

include('.\templates\db.php');

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href=".\css\queryTables.css" />
</head>
<body class="bg-light info">
  <?php include ('.\templates\header.php'); ?>
	<div class="container">
	    <br>
		  <form action="search.php" method="POST" class="form-inline my-2 my-lg-0">
			<input type="text" name="inputtext"></input>
			<input class="btn btn-secondary btn-sm" type="submit" name="search" value="Search">
		  </form>
	      
      <table class="table">
			<tr>
			  <td> Job ID</td>
              <td> Company Name </td>
              <td> Created Date </td>
              <td> Contact Name </td>
              <td> Contact No </td>
              <td> Address </td>
              <td> Created By </td>
              <td> Assigned to </td>
              <td> Description </td>
              <td> Status </td>
              <td> Edit </td>
            </tr> <br>	
			<?php 
				$conn = mysqli_connect("localhost","Ken","ken@123");
				$db = mysqli_select_db($conn, "service");

				if (isset($_POST['search'])) {
					
					$inputtext = $_POST['inputtext'];

					$query = "SELECT * FROM jobtasks WHERE comname LIKE '%$inputtext%' OR cname LIKE '%$inputtext%' OR tel LIKE '%$inputtext%' OR address LIKE '%$inputtext%' OR createemp LIKE '%$inputtext%' OR assignemp LIKE '%$inputtext%' OR description LIKE '%$inputtext%' OR status LIKE '%$inputtext%' ";
					$query_run = mysqli_query($conn, $query);

						while ($row=mysqli_fetch_assoc($query_run)) {

					     $JobID = $row['jobid'];
                         $CompName = $row['comname'];
                         $CreateDate = $row['created_date'];
                         $Contact = $row['cname'];
                         $Con_Tel = $row['tel'];
                         $Address = $row['address'];
                         $Created_By = $row['createemp'];
                         $Assigned_To = $row['assignemp'];
                         $Description = $row['description'];
                         $Status = $row['status'];
							
					?>
						<tr>
						  <td><?php echo $row['jobid']; ?></td>
                          <td><?php echo $row['comname']; ?></td>
                          <td><?php echo $row['created_date']; ?></td>
                          <td><?php echo $row['cname']; ?></td>
                          <td><?php echo $row['tel']; ?></td>
                          <td><?php echo $row['address']; ?></td>
                          <td><?php echo $row['createemp']; ?></td>
                          <td><?php echo $row['assignemp']; ?></td>
                          <td><?php echo $row['description']; ?></td>
                          <td><?php echo $row['status']; ?></td>
                          <td><a class = "btn btn-success" href="edit.php?GetID=<?php echo $JobID ?>">Edit</a></td>
                        </tr>

				<?php
						}
					}
					
				 ?>




	 </table>
	</div>
	
	<center><?php include('.\templates\footer.php'); ?></center>
  </body>
</html>