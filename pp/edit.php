<?php 

   $JobID = '';
   require_once("templates/db_connect.php");
   $mysqli = new mysqli ('localhost', 'Ken', 'ken@123', 'service');
  
    
    $JobID = mysqli_real_escape_string($conn,$_GET['GetID']);
    $query = "SELECT * from jobtasks where jobid='".$JobID."' ";
    $result = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($result))
    {
     $JobID = $row['jobid'];
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
    <title>Edit Customer Info</title>
</head>
<body class="bg-light">
    <?php include ('templates/header.php'); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-primary text-white text-center py-3"> Update Call </h3>
                        </div>
                        <div class="card-body">

                            <form action="templates/update.php?GetID=<?php echo $JobID ?>" method="post">
                                <label>Company Name</label>
                                <input type="text" class="form-control mb-2" placeholder=" Company Name " name="comname" value="<?php echo $CompName ?>">
                                <label>Contact Name</label>
                                <input type="text" class="form-control mb-2" placeholder=" Contact Name " name="cname" value="<?php echo $Contact ?>">
                                <label>Contact No</label>
                                <input type="text" class="form-control mb-2" placeholder=" Contact No " name="tel" value="<?php echo $Con_Tel ?>">
                                <label>Contact Address</label>
                                <input type="text" class="form-control mb-2" placeholder=" Address " name="address" value="<?php echo $Address ?>">
                                <label>Created By</label>
                                <input type="text" class="form-control mb-2" placeholder=" Created By " name="createemp" value="<?php echo $Created_By ?>">
                                <label>Assigned To</label>
                                <input type="text" class="form-control mb-2" placeholder=" Assigned To " name="assignemp" value="<?php echo $Assigned_To ?>">
                                <label>Call Description</label>
                                <input type="text" class="form-control mb-2" placeholder=" Description " name="description" value="<?php echo $Description ?>">
                                <label>Call Status</label>
                                <input type="text" class="form-control mb-2" placeholder=" Status " name="status" value="<?php echo $Status ?>">
                                <br>
                               <center><button class="btn btn-primary" name="update">Update</button>
                                <a class="btn btn-primary" href="jobview.php" name="back">Back</button></a></center>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
            <center><?php include('templates/footer.php'); ?></center>
</html>


                                   