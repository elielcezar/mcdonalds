
<html>
<head>
  <title>Radio McDonalds</title>
</head>
<body>

<?php
// MEGA06MAR2018
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}else{
  header("location: dashboard.php");
}

?>


<?php include "footer.php"; ?>
