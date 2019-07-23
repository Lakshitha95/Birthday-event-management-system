<?php

   if (isset($_GET['submit'])) {
   	
    //Create variables
    $fname = $_GET['firstname'];
    $lname = $_GET['lastname'];
    $pname = $_GET['pname'];
    $bdate = $_GET['bdate'];
    $oemail = $_GET['oemail'];
    $pemail = $_GET['pemail'];
    $phone = $_GET['Phone'];
    $fblink = $_GET['Facebook'];
    $designation = $_GET['Designation'];
    $nic = $_GET['NIC'];
    $studentId = $_GET['StudentId'];
    $food = $_GET['food'];
    $utype = $_GET['select'];
    $notes = $_GET['Notes'];
    $pass = $_GET['Password'];
    
    //Database connecction
    require 'Db_connection.php';

    //query to add user to db
    $query = "INSERT INTO User_details (Firstname, Lastname, Preferredname, DateofBirth, Officialemail, Personalemail, Mobilenumber,Facebooklink, Designation, Nic, StudentId, Food, UserType, Notes, password ) VALUES ('$fname', '$lname', '$pname', '$bdate', '$oemail', '$pemail', '$phone', '$fblink', '$designation', '$nic', '$studentId', '$food','$utype', '$notes', '$pass')";

    //execute query to db
    $result = mysqli_query($con, $query);

    if( !$result ) {
    exit("Error: failed to execute query. " . mysqli_error($con));
    }
    
    //Redirect to User login page
    mysqli_close($con);
    echo "<script>alert('Congratulations $pname, your account has been created successfully!')</script>" . PHP_EOL;
    header('refresh:3; URL=http://localhost:8080/ClassTest/User_login.php');

}

?>