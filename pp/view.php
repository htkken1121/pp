<?php 

 require_once("templates\db_connect.php");
   $mysqli = new mysqli ('localhost', 'Ken', 'ken@123', 'service');
  
    
    $JobID = mysqli_real_escape_string($conn,$_GET['GetID']);
    $query = "SELECT * from jobtasks where jobid='".$JobID."' ";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
     $JobID = $row['jobid'];
     $Create_Date = $row['created_date']; 
     $CompName = $row['comname'];
     $Contact = $row['cname'];
     $Con_Tel = $row['tel'];
     $Address = $row['address'];
     $Created_By = $row['createemp'];
     $Assigned_To = $row['assignemp'];
     $Description = $row['description'];
     $Status = $row['status'];
    }

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="framework\bootstrap\css\bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css\style.css">
    <title>Edit Customer Info</title>
</head>
<body class="bg-light">
    <?php include ('templates\header.php'); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-primary text-white text-center py-3"> View Call Only </h3>
                        </div>
                       
                        <div class="card-body">
                         <center><h3> <?php echo "Company Name: " . " $CompName"; ?></h3></center>
                         <center><h4> <?php echo "Maintenance" ?></h4></center>
                         <center><h5> <?php echo "Expiry Date: " . "(". "2021-12-30" .")" ?></h5></center> 
                           <h4> <?php echo "Call No.: " . " $JobID"; ?></h4><br>
                           <h4> <?php echo "Create Date: " . " $Create_Date"; ?></h4><br>
                           <h4> <?php echo "Contact Name: " . " $Contact"; ?></h4><br>
                           <h4> <?php echo "Contact No.: " . " $Con_Tel"; ?></h4><br>
                           <h4> <?php echo "Contact Address: " . " $Address"; ?></h4><br>
                           <h4> <?php echo "Created By: " . " $Created_By"; ?></h4><br>
                           <h4> <?php echo "Assigned To: " . " $Assigned_To"; ?></h4><br>
                           <h4> <?php echo "Call Description: " . " $Description"; ?></h4><br>
                           <h4> <?php echo "Call Status: " . " $Status"; ?></h4><br>
                           
                           
                            <form action="main.php" method="post">
                               <br>
                              
                              <div id="options"> 
                             <button class="btn btn-primary" name="back">Back</button>
                               </div>

                                 
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
            <center><?php include('templates/footer.php'); ?></center>
</html>


                                   