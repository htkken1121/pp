<?php 

// connect DB
include ('templates/db_connect.php');
$query = " SELECT * from jobtasks ORDER BY jobid desc ";
$result = mysqli_query($conn,$query);

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

//$sql = 'select * from users';
  //$sql = 'SELECT * FROM computers';

  // get result 
//$result = mysqli_query($conn, $sql);

//$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//mysqli_free_result($result);

// Close DB Connection
//mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href = "css/queryTables.css" />
    <title>View Records</title>
</head>
<body class="bg-light info">
<?php include ('templates/header.php'); ?>

<form action="#" method="#" class="form-inline my-2 my-lg-0">
                     
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
            <td> View </td>
          </tr>

          <?php 
                                    
                       while($row=mysqli_fetch_assoc($result))
                   {
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
                         <td><a class = "btn btn-info" href="view.php?GetID=<?php echo $JobID ?>">View</a></td>
                        </tr>        
                     <?php 
                   }  
                     ?>                                                                    
         </table>
     </form>
	

<br>
<center><?php include('templates/footer.php'); ?></center>
</html>