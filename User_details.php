<!DOCTYPE html>
<html>
<head>
	<title>Input user details</title>

</head>
<body>
	<center>

	<H1>User details input form</H1>
	<form method="_GET" action="Insert_details.php">
	   <!-- Create user details input form -->
	   <label>First Name : </label>
	   <input type="text" name="firstname" placeholder="-First name-">
	   <br><br>
       
       <!--Text field-->
	   <label>Last Name : </label>
	   <input type="text" name="lastname" placeholder="-Last name-">
	   <br><br>
       
       <!--Text field-->
	   <label>Preferred Name : </label>
	   <input type="text" name="pname" placeholder="-Preferred name-">
	   <br><br>

       <!--Date picker-->
	   <label>Full date of birth : </label>
	   <input type="date" name="bdate">
	   <br><br>
       
       <!--Email field-->
	   <label>Official Email : </label>
	   <input type="email" name="oemail" placeholder="-Official Email-">
	   <br><br>
    
       <!--Email field-->
	   <label>Personal Email : </label>
	   <input type="email" name="pemail" placeholder="-Personal Email-" >
	   <br><br>
       
       <!--Text field-->
	   <label>Mobile Number : </label>
	   <input type="text" name="Phone" placeholder="-Phone number-">
	   <br><br>
      
       <!--Text field-->
	   <label>Facebook link : </label>
	   <input type="text" name="Facebook" placeholder="-Link-">
	   <br><br>
  
       <!--Text field-->
	   <label>Designation : </label>
	   <input type="text" name="Designation" placeholder="-Designation-">
	   <br><br>

       <!--Text field-->
	   <label>NIC : </label>
	   <input type="text" name="NIC" placeholder="-NIC-">
	   <br><br>
    
       <!--Text field-->
	   <label>Student Index : </label>
	   <input type="text" name="StudentId" placeholder="-Student Index-">
	   <br><br>
  
       <!--Radio buttons-->
	   <label>Food preffered : </label>
	   <input type="radio" name="food" value="V">Veg
	   <input type="radio" name="food" value="N">Non-Veg
	   <br><br>

	   <!--Dropdown list-->
	   <label>User type :</label>
       <select name="select">
         <option value="Student"                >Student</option>
         <option value="AdministrativeStaff"    >Administrative staff</option>
         <option value="TemporaryAcademicStaff" >Temporary academic staff</option>
         <option value="AcademicStaff"          >Academic staff</option>
       </select><Br><Br>

       <!--Text field-->
	   <label>Notes : </label>
	   <input name="Notes" type="text" size="200">
	   <br><br>

	   <!--Password field-->
	   <label>Password :</label>
	   <input type="Password" name="Password" placeholder="-Password-">
	   <br><br>
   	
   		<!--Submit and Reset buttons-->
	   <button type="submit" name="submit">Submit</button>&nbsp&nbsp
	   <button type="reset">Reset </button>&nbsp&nbsp
	   </form>
	   <button type="submit" onclick="window.location.href='http://localhost:8080/ClassTest/User_login.php'">Cancel</button><br><br>

	
	</center>

</body>
</html>