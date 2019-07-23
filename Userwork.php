<?php
 //database connection	
 require 'Db_connection.php';

 $nic  = ""; 
 $name = "";
 $pt   = "";
 $edit_state = false;

//Insert data
 if (isset($_GET['submit'])) {
	
 $nic  = $_SESSION['username'];
 $name = $_GET['name'];
 $cont = $_GET['contri'];

 //Query to insert data
 $query = "INSERT INTO contribution (Nic, Name, Participation) VALUES ('$nic', '$name', '$cont')";
 mysqli_query($con, $query);
 $_SESSION['msg'] = "Saved!";
 header('location:UserUI.php');//Redirect to User page
}

  //Update records
 if (isset($_GET['Update'])) {
   $nam  = mysqli_real_escape_string($con,$_POST['name']);
   $date = mysqli_real_escape_string($con,$_POST['datetime']);
   $ven  = mysqli_real_escape_string($con,$_POST['venue']);
   $not  = mysqli_real_escape_string($con,$_POST['note']);
   $st   = mysqli_real_escape_string($con,$_POST['status']); 

   mysqli_query($con, "UPDATE event SET name='$nam', datetime='$date', venue='$ven', note='$not',status='$st'");
   header('location:Event.php');//Redirect to Event page

}

?>