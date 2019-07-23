<?php 

  $Id  ="";
  $nam ="";
  $date="";
  $ven ="";
  $not ="";
  $st  ="";
  $edit_state = false; 
  
  //Database connection
  require 'Db_connection.php';

  if(isset($_POST['save'])) {
    $name  = $_POST['name'];
  	$dtime = $_POST['datetime'];
  	$venue = $_POST['venue'];
  	$note  = $_POST['note'];
  	$status= $_POST['status'];

  //Query to insert data
  $Query = "INSERT INTO event (name,datetime,venue,note,status) VALUES ('$name','$dtime','$venue','$note','$status')";

  //execute query to db
  $result = mysqli_query($con, $Query);

  if( !$result ) {
    exit("Error: failed to execute query. " . mysqli_error($con));
    }
    
  //Redirect to User OrganizerUI page
  mysqli_close($con);
  echo "<script>alert('Event has been created successfully!')</script>" . PHP_EOL;
  header('location:Event.php');//Redirect to Event page
  }

  //Update records
  if (isset($_POST['Update'])) {
   $nam  = mysqli_real_escape_string($con,$_POST['name']);
   $date = mysqli_real_escape_string($con,$_POST['datetime']);
   $ven  = mysqli_real_escape_string($con,$_POST['venue']);
   $not  = mysqli_real_escape_string($con,$_POST['note']);
   $st   = mysqli_real_escape_string($con,$_POST['status']); 

   mysqli_query($con, "UPDATE event SET name='$nam', datetime='$date', venue='$ven', note='$not',status='$st'");
   //$_SESSION['msg'] = "Updated!";
   header('location:Event.php');//Redirect to Event page
  }

   //Delete records
   if (isset($_GET['del'])) {
    $Id = $_GET['del'];
    mysqli_query($con, "DELETE FROM event WHERE Id='$Id' ");
    $_SESSION['msg'] = "Deleted!";
    header('location:Event.php');//Redirect to Event page
   } 

   //Retrieve data from database
   $results = mysqli_query($con, "SELECT * FROM event");

?>