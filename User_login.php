<?php
session_start();
?>
<!DOCTYPE>
<html>
<head>
	<title>Login</title>
</head>

<body>
	<center>
	<h1>User Login</h1>
	<div class = "container">
	<form  method="POST">
		<!-- Userntype selection-->
		<label>User type :&nbsp</label>
       <select name="select" >
       	 <option value="SystemAdmin"  >System admin</option>
         <option value="Orgenizer"    >Orgenizer</option>
         <option value="OtherUser"    >Other user</option>
        
       </select><Br><Br>
       
	<div class="form_input">
		<!-- Entering NIC-->
		<label>NIC :&nbsp </label>
		<input type="text" name="NIC" placeholder="-type NIC here-"> <br><br>
	</div>
	<div class = "form_input">
		<!-- Entering password-->
		<label>Password : </label>
		<input type="password" name="password" placeholder="-type password here-"> <br><br><br>
	</div>
	    <!--login button and cancel button -->
		<input class ="btn btn-primary" type="submit" name="Login" value="Login"> &nbsp&nbsp&nbsp&nbsp&nbsp
		<input class ="btn btn-primary" type="submit" name="cancel" value="Cancel"> 
	</form>
	    <label>If not please &nbsp</label>
	    <button type="submit" name="signin" onclick="window.location.href='http://localhost:8080/ClassTest/User_details.php'">Sign Up</button>
    </div>
</center>
</body>
</html>

<?php

//create connection with database
require 'db_connection.php';

if(isset($_POST['Login']))
{
	$usertype = $_POST['select'];
	$nic = $_POST['NIC'];
	$password = $_POST['password'];
    
    //Write query for comparing credentials
	$query2 = "SELECT * FROM administrators WHERE UserType ='".$usertype."' AND Nic='".$nic."' AND password ='".$password."'" ;
	
	$result = $con ->query($query2);
    $_SESSION['username'] = $nic;
  

	if ($result) {
		while ($row=mysqli_fetch_array($result)) {
			echo '<script type="text/javascript">alert("Successfully logged in as ' .$row['usertype'].'")</script>';
		}
		if ($usertype=="SystemAdmin") {
			header("location:AdminUI.php"); 
		}elseif ($usertype=="Orgenizer") {
			header("location:OrganizersUI.php");
		}elseif ($usertype=="OtherUser") {
			$query3 = "SELECT * FROM user_details WHERE Nic ='".$nic."' AND password ='".$password."' ";
			$result2 = $con ->query($query3);
			if ($result2) {
				header("location:UserUI.php");
			}
		}
	}

	
}

?>
