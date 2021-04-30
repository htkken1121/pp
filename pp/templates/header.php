<?php 


  // delete S_SESSION 
  if ($_SERVER['QUERY_STRING'] == "delname") {
  unset($_SESSION['username']);
  }
  $mysession = $_SESSION['username'] ?? '';
 // echo $my_session;
 $type = "";

 ?>

 <?php 

function timeZone() {
date_default_timezone_set('Asia/Hong_Kong');
$date = date('H:i', time());
if ($date < '12:00'){
echo 'Good Morning';
} else
echo 'Good Afternoon';
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Customer & Employee Services System</title>
<meta name="Description" content="Customer & Employee Services System">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="framework/bootstrap/css/bootstrap.min.css" type="text/css" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="framework/bootstrap/js/bootstrap.min.js"></script> 
</head>
<body>
	

  <nav class="navbar navbar-expand-md navbar-light" style="background-color: #d9ecff;">
  <a class="navbar-brand" href="main.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

<?php 
  $db = mysqli_connect('localhost', 'Ken', 'ken@123', 'service');

 // echo $_SESSION['username'];

$query =mysqli_query($db, "SELECT * from users where username='".$_SESSION['username']."'");

while ($row=mysqli_fetch_array($query)) {

$type  = $row['type']; 
}
if ($type=='Admin') {


 ?>
  
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
     
  <li class="nav-item dropdown">  
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Service Call
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="jobview.php">View Job</a>
          <a class="dropdown-item" href="createcall.php">Create Service Call</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="search.php">Search Job</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="att.php">Attendance</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="reg.php">Create Account</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="admcpass.php">Admin Change Password</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>
     </ul>
   </div>     
          
    <ul class="nav navbar-nav navbar-right">
       <li class="fa-sign-in"><span class="glyphicon glyphicon-user"></span><b><?php timeZone(); ?></b>&nbsp;&nbsp; 
        <?php echo htmlspecialchars($mysession) ?> &nbsp;
       </li>

     <li><a href="logout.php?logout='1'"> 
        <input type="image" id="image" title="Logout" 
          src="img/logout.png"></a></li>
     <!-- <a href="../login.php" class="btn btn-info">Logout</a> -->
    </ul>
</nav>

<?php }elseif ($type=="User") { ?>

   <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
     
      <li class="nav-item dropdown">  
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Service Call
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="jobview.php">View Call</a>
          <a class="dropdown-item" href="createcall.php">Create Service Call</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="search.php">Search Job</a>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="att.php">Attendance</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="cpass.php">Change Password</a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>
     </ul>
   </div>        
     
    <ul class="nav navbar-nav navbar-right">
       <li class="fa-sign-in"><span class="glyphicon glyphicon-user"></span><b><?php timeZone(); ?></b>&nbsp;&nbsp; 
        <?php echo htmlspecialchars($mysession) ?> &nbsp;
       </li>  
     
     <li><a href="logout.php?logout='1'"> 
        <input type="image" id="image" title="Logout" 
          src="img/logout.png"></a></li>
     <!-- <a href="../login.php" class="btn btn-info">Logout</a> -->
    </ul>
</nav> 

<?php }elseif ($type=="Technician") { ?>

   <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
     
     <li class="nav-item">
        <a class="nav-link" href="field_att.php">Attendance</a>
      </li> 

      <li class="nav-item">
        <a class="nav-link" href="cpass.php">Change Password</a>
      </li>
     
     </ul>
   </div>        
     
    <ul class="nav navbar-nav navbar-right">
       <li class="fa-sign-in"><span class="glyphicon glyphicon-user"></span><b><?php timeZone(); ?></b>&nbsp;&nbsp; 
        <?php echo htmlspecialchars($mysession) ?> &nbsp;
       </li>  
     
     <li><a href="logout.php?logout='1'"> 
        <input type="image" id="image" title="Logout" 
          src="img/logout.png"></a></li>
     <!-- <a href="../login.php" class="btn btn-info">Logout</a> -->
    </ul>
</nav> 
   

<?php }elseif ($type=="IT") { ?>

   <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
     
      <li class="nav-item">
        <a class="nav-link" href="att.php">Attendance</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="reg.php">Create Account</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="admcpass.php">Change Password</a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>
     </ul>
   </div>        
     
    <ul class="nav navbar-nav navbar-right">
       <li class="fa-sign-in"><span class="glyphicon glyphicon-user"></span><b><?php timeZone(); ?></b>&nbsp;&nbsp; 
        <?php echo htmlspecialchars($mysession) ?> &nbsp;
       </li>  
     
     <li><a href="logout.php?logout='1'"> 
        <input type="image" id="image" title="Logout" 
          src="img/logout.png"></a></li>
     <!-- <a href="../login.php" class="btn btn-info">Logout</a> -->
    </ul>
</nav> 
   

<?php } ?>   



</body>