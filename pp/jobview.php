<?php 

 	include('.\templates\db.php');
    $query = " SELECT * from jobtasks ORDER BY jobid desc Limit 5";
    $result = mysqli_query($db,$query);


if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href=".\css\queryTables.css" />
    <title>View Records</title>
</head>
<body class="bg-light info">
    <?php include ('.\templates\header.php'); ?>
     <form action=".\templates\db.php" method="POST" class="form-inline my-2 my-lg-0">
        <input class="btn btn-secondary btn-sm" type="submit" value="Export to Excel" name="exportToCSV" title="Export to Excel" >
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
                         <td><a class = "btn btn-success" href="edit.php?GetID=<?php echo $JobID ?>">Edit</a></td>
                         <td><a class = "btn btn-info" href="view.php?GetID=<?php echo $JobID ?>">View</a></td>
                        </tr>        
                     <?php 
                   }  
                     ?>                                                                    
         </table>
     </form>
    <br>
  <center><?php include('.\templates\footer.php'); ?></center>
</body>
</html>