<?php 

// connect DB
include ('.\templates\db.php'); 



$mysqli = new mysqli ('localhost', 'Ken', 'ken@123', 'service');
$queryCheckUsr = $mysqli -> query("SELECT username FROM emp"); //select for support colleagues
$queryCheckTech = $mysqli -> query("SELECT * from emp INNER JOIN users on emp.username = users.username where type='technician'"); //select technician colleagues

// Close DB Connection
mysqli_close($db);

if (!isset($_SESSION['username'])) {
    header('location:login.php');
}

?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href=".\css\service.css">
  <link rel="stylesheet" type="text/css" href=".css\error.css">
  <link rel="stylesheet" href=".\framework\bootstrap\css\bootstrap.min.css" type="text/css" media="screen">
</head>
<body>
<?php include ('.\templates\header.php'); ?>

<br>
     <center><h2> Create Job </h2></center>
    <div class="container">
        <form action=".\createcall.php" method="POST">
         <!-- display validation error -->
     
        
      <div class="form-group">
       <label for="exampleFormControlInput1">Company Name:</label> 
       <input class="form-control" type="text" name="comname" id="comname">
     </div>  
     <div class="form-group">
       <label for="exampleFormControlSelect1">Created By:</label>
         <select class="form-control" name="createemp" id="createemp">
      <?php 
          while ($row = $queryCheckUsr->fetch_assoc()) {
          $username = $row['username'];
           echo "<option value='$username'>$username</option>";
          }
        ?>
        </select>
     </div> 
      <div class="form-group">
       <label for="exampleFormControlInput1">Contact Name:</label> 
       <input class="form-control" type="text" name="cname" id="cname">
      </div>
      <div class="form-group">
       <label for="exampleFormControlInput1">Contact Number:</label> 
       <input class="form-control" type="text" name="tel" id="tel">
     </div>
     <div class="form-group">
       <label for="exampleFormControlInput1">Address:</label> 
       <input class="form-control" type="text" name="address" id="address">
     </div> 
     <div class="form-group">
       <label for="exampleFormControlSelect1">Assigned to:</label>
         <select class="form-control" name="assignemp" id="assignemp">
        <?php 
          while ($row = $queryCheckTech->fetch_assoc()) {
          $username = $row['username'];
           echo "<option value='$username'>$username</option>";
          }
        ?>
        </select>
     </div> 
    <div class="form-group">
       <label for="exampleFormControlInput1">Description:</label> 
       <input class="form-control" type="text" name="description" id="description">
      </div>
      <div class="form-group">
       <label for="exampleFormControlSelect1">Status:</label>
         <select class="form-control" name="status" id="status">
          <option>Open</option>
          <option>Processing</option>
          <option>Completed</option>
          <option>Closed</option>
        </select>
     </div>   
       <center><input type="submit" name="create" class="btn btn-primary mb-2 btn-lg" value="Create"></center>
      </form>
    </div>
   <br>

<center><?php include('.\templates\footer.php'); ?></center>  
</html>