<?php 
	session_start();

	$username = "";
	$search = "";
	//$empid = "";
	$errors = array();
	$db = mysqli_connect('localhost', 'Ken', 'ken@123', 'service');

        // register User
	if (isset($_POST['register'])) {
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password1 = mysqli_real_escape_string($db,$_POST['password1']);
		$password2 = mysqli_real_escape_string($db,$_POST['password2']);
		$type = mysqli_real_escape_string($db,$_POST['type']);

		if(empty($username)) {
			array_push($errors, "Username is required");
		}
		if(empty($password1)) {
			array_push($errors, "Password is required");
		}
		if ($password1 != $password2) {
			array_push($errors, "The two password are not same");
		}

		if (count($errors) == 0) {

			$chkquery =mysqli_query($db,"SELECT * FROM users WHERE username='$username' ");
			$result = mysqli_num_rows($chkquery);
			if ($result>0){
				array_push($errors, "The username has already existed");
			} else {
			$password=md5($password1);
			$sql = "INSERT INTO users (username, password, type) 
					   VALUES ('$username', '$password', '$type')";
			mysqli_query($db,$sql);	
			//$_SESSION['username'] = $username;
			echo "<script>alert('Account created successfully!'); window.location='reg.php'</script>";
			//header('location: login.php');
          }
		}
      }

	  // login user
	if (isset($_POST['login'])) {
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
				
		if(empty($username)) {
			array_push($errors, "Username is required");
		}
		if(empty($password)) {
			array_push($errors, "Password is required");
		}
					

		if (count($errors) == 0) {
			$password =md5($password);
			$query = mysqli_query($db, "SELECT * FROM users WHERE username='$username' AND password='$password'");
			//$result = mysqli_query($db, $query);
		  
			if (mysqli_num_rows($query) > 0) {
				$_SESSION['username'] = $username;
				header('location: main.php');
			}else {
				array_push($errors, "The username and Password incorrect, Please contact IT Department");
			}
		} //if (count($errors) == 0)
	} //if (isset($_POST['login']))


	if (isset($_POST['submit'])) {
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$old_pass = mysqli_real_escape_string($db,$_POST['old_pass']);
		$new_pass = mysqli_real_escape_string($db,$_POST['new_pass']);
		$renew_pass = mysqli_real_escape_string($db,$_POST['renew_pass']);
		

		if(empty($username)) {
			array_push($errors, "Username is required");
		}
		if(empty($old_pass)) {
			array_push($errors, "Password is required");
		}
		if ($new_pass != $renew_pass) {
			array_push($errors, "Your input password is not match");
		}

		if (count($errors) == 0) {

			$chg_pass=mysqli_query($db, "SELECT username, password from users where username='$username' AND password='old_pass'");
			$chg_pass1=mysqli_fetch_array($chg_pass);
			$data_pass=$chg_pass1['old_pass'];
			if ($data_pass=$new_pass){
				if($new_pass==$renew_pass)
			$old_pass=md5($new_pass);
			$update_sql =mysqli_query($db, "UPDATE users SET password='$old_pass' WHERE username='$username'") ;
			mysqli_query($db,$update_sql);	
			echo "<script>alert('Password Changed!'); window.location='cpass.php'</script>";

			}
		  }

		} // if (isset($_POST['submit'])) {


		if (isset($_POST['c_submit'])) {
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$new_pass = mysqli_real_escape_string($db,$_POST['new_pass']);
		

		if(empty($username)) {
			array_push($errors, "Username is required");
		}
		if(empty($new_pass)) {
			array_push($errors, "Password is required");
		}
		
		if (count($errors) == 0) {

			$chg_pass=mysqli_query($db, "SELECT * from users where username='$username' AND password='$new_pass'");
			$chg_pass1=mysqli_fetch_array($chg_pass);
			$data_pass=$chg_pass1['password'];
			if ($data_pass=$new_pass){
			$password=md5($new_pass);
			$update_sql =mysqli_query($db, "UPDATE users SET password='$password' WHERE username='$username'") ;
			mysqli_query($db,$update_sql);	
			echo "<script>alert('Password Changed!'); window.location='admcpass.php'</script>";

			}
		  }
		} // if (isset($_POST['c_submit']))


		if (isset($_POST['att_login'])) {
		$empid = mysqli_real_escape_string($db,$_POST['empid']);
		//$empname = mysqli_real_escape_string($db,$_POST['empname']);
						
		if(empty($empid)) {
			array_push($errors, "Not Yet Input Employee ID");
		}
			
		if (count($errors) == 0) {
			
			$chkquery =mysqli_query($db,"SELECT empid, empname FROM emp WHERE empid='$empid'");
			$result = mysqli_num_rows($chkquery);
			if ($result>0){
				$sql = "INSERT INTO time_in (empid) 
				SELECT empid
				FROM emp WHERE empid='$empid'";
			mysqli_query($db,$sql);	
			$_SESSION['empid'] = $empid;
			//$_SESSION['empname'] = $empname;
			echo "<script>alert('Success Recorded!'); window.location='time.php'</script>";
			} 
			else {
			echo "<script>alert('Sorry! The System does not exist with this employee ID.'); window.location='time.php'</script>";
			}
		}
	} // Attendance Record to database

       
       // craate job 
     if(isset($_POST['create']))
    {
       if(empty($_POST['comname']) || empty($_POST['cname']) || empty($_POST['tel']) || empty($_POST['address']) || empty($_POST['description']) || empty($_POST['createemp']) || empty($_POST['assignemp']) || empty($_POST['status']))
        {
                      
            echo "<script>alert('Please fill the blank!'); window.location='./createcall.php'</script>";
        }
        else
        {
            $CompName = mysqli_real_escape_string($db,$_POST['comname']);
            $Contact = mysqli_real_escape_string($db,$_POST['cname']);
            $Con_Tel = mysqli_real_escape_string($db,$_POST['tel']);
            $Address = mysqli_real_escape_string($db,$_POST['address']);
            $Created_By = mysqli_real_escape_string($db,$_POST['createemp']);
            $Assigned_To = mysqli_real_escape_string($db,$_POST['assignemp']);
            $Description = mysqli_real_escape_string($db,$_POST['description']);
            $Status = mysqli_real_escape_string($db,$_POST['status']);

            $query = " INSERT INTO jobtasks (comname, cname, tel, address, createemp, assignemp, description, status) values('$CompName','$Contact','$Con_Tel', '$Address', '$Created_By', '$Assigned_To', '$Description', '$Status')";
            $result = mysqli_query($db,$query);

            if($result)
            {
                header("location: jobview.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    } //if (isset($_POST['create']))
   

     // Export to CSV file
    if(isset($_POST["exportToCSV"]))
	{
		$db = mysqli_connect('localhost', 'Ken', 'ken@123', 'service');
		//header("Content-Encoding: UTF-8"); 
		header("Content-Type: text/csv; charset=UTF-8");
		header("Content-Disposition: attachment; filename=reportTable_".date("d-m-Y").".csv");
		$output = fopen("php://output", "w");
		echo "\xEF\xBB\xBF"; // first send the UTF-8 BOM for Excel

		//echo html_entity_decode(urldecode($_POST["exportData"]));
		fputcsv($output, array('Job ID','Company Name', 'Created Date', 'Contact Name', 'Contact No', 'Address', 'Created By', 'Assigned To', 'Description', 'Status'));
		$query = "SELECT * FROM jobtasks order by jobid desc";
		$result = mysqli_query($db, $query);
	
		while ($row = mysqli_fetch_assoc($result)) 
		{
			fputcsv($output, $row);

		}

		fclose($output);

	}

	 // Export to CSV file
    if(isset($_POST["exportAttToCSV"]))
	{
		$db = mysqli_connect('localhost', 'Ken', 'ken@123', 'service');
		header("Content-Encoding: UTF-8"); 
		header("Content-Type: text/csv; charset=UTF-8");
		header("Content-Disposition: attachment; filename=reportAttTable_".date("d-m-Y").".csv");
		$output = fopen("php://output", "w");
		echo "\xEF\xBB\xBF"; // first send the UTF-8 BOM for Excel

		//echo html_entity_decode(urldecode($_POST["exportData"]));
		fputcsv($output, array('Employee ID','Employee Name', 'Date', 'Time'));
		$aquery = "SELECT emp.empid, emp.empname, DATE(time_in.att_in) as Date, TIME(time_in.att_in) as Time FROM emp inner JOIN time_in on emp.empid = time_in.empid ORDER BY DATE desc";
		$aresult = mysqli_query($db, $aquery);
	
		while ($r = mysqli_fetch_assoc($aresult)) 
		{
			fputcsv($output, $r);

		}

		fclose($output);
	} // exportAttToCSV
	
 
	// logout
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}
?>