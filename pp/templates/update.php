<?php 
	 
	 require_once("db_connect.php");

	 if(isset($_POST['update']))

	 {
	 	$JobID = mysqli_real_escape_string($conn,$_GET['GetID']);
        $CompName = mysqli_real_escape_string($conn,$_POST['comname']);
        $Contact = mysqli_real_escape_string($conn,$_POST['cname']);
        $Con_Tel = mysqli_real_escape_string($conn,$_POST['tel']);
        $Address = mysqli_real_escape_string($conn,$_POST['address']);
        $Created_By = mysqli_real_escape_string($conn,$_POST['createemp']);
        $Assigned_To = mysqli_real_escape_string($conn,$_POST['assignemp']);
        $Description = mysqli_real_escape_string($conn,$_POST['description']);
        $Status = mysqli_real_escape_string($conn,$_POST['status']);

        $query = " UPDATE jobtasks set comname = '".$CompName."', cname = '".$Contact."', tel = '".$Con_Tel."', address = '".$Address."', createemp = '".$Created_By."', assignemp = '".$Assigned_To."', description = '".$Description."', status = '".$Status."' WHERE jobid = '".$JobID."' "; 
        $result = mysqli_query($conn,$query);



        if($result)
        {
           echo "<script>alert('Update Record Successfully!'); window.location='../jobview.php'</script>"; 
          
        }
        else
        {
            echo "<script>alert('Update failed!'); window.location='../edit.php'</script>";
        }
    }
    else
    {
        echo "Connection Error!";
    }


?>
