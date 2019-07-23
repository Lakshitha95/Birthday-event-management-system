<?php
 session_start();
 
 $select = "";
 $nic = "";
 $pass = "";
 $edit_state = false;

 //Database connection
 require 'Db_connection.php';
 
 if (isset($_POST['save'])) {
   $select = $_POST['select'];
   $nic = $_POST['NIC'];
   $pass = $_POST['Password'];

   $query = "INSERT INTO administrators (UserType, Nic, password) VALUES ('$select', '$nic', '$pass')";
   mysqli_query($con, $query);
   $_SESSION['msg'] = "Saved!";
   header('location:AdminUI.php');//Redirect to Admin page
 }

 //Update records
 if (isset($_POST['Update'])) {
 	 $select = mysqli_real_escape_string($con,$_POST['select']);
 	 $nic = mysqli_real_escape_string($con,$_POST['NIC']);
 	 $pass = mysqli_real_escape_string($con,$_POST['Password']); 

 	 mysqli_query($con, "UPDATE administrators SET UserType='$select', Nic='$nic', password='$pass'");
 	 $_SESSION['msg'] = "Updated!";
 	 header('location:AdminUI.php');//Redirect to Admin page

 }
 
 //Delete records
 if (isset($_GET['del'])) {
 	$nic = $_GET['del'];
 	mysqli_query($con, "DELETE FROM administrators WHERE Nic='$nic' ");
 	$_SESSION['msg'] = "Deleted!";
 	header('location:AdminUI.php');//Redirect to Admin page
 } 

 //Retrieve data from database
 $results = mysqli_query($con, "SELECT * FROM administrators");
 

?>  