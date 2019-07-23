<?php
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>User</title>
</head>
<body>
 <center>
 	<h1>Welcome user&nbsp <?php echo $_SESSION['username'] ?> </h1>
 </center>

    <form method="POST" >
      
      <!--Date category selection-->
      <label for="group"><b>Select one:</b></label><br/><br/>
      <input type="radio" name="group" id="today"      value="today"      >Today
      <input type="radio" name="group" id="tomorrow"   value="tomorrow"   >Tomorrow
      <input type="radio" name="group" id="datomorrow" value="datomorrow" >Day After Tomorrow
      <input type="radio" name="group" id="thisweek"   value="thisweek"   >This week
      <input type="radio" name="group" id="nxtweek"    value="nxtweek"    >Next week
      <input type="radio" name="group" id="thismonth"  value="thismonth"  >This month<br/><br/>

      <input type="submit" value="Search Birthdays"><br><br>

   </form>

 <table>
   <?php
     require 'Db_connection.php';

  $today=date("m-d");
  $answer=mysqli_real_escape_string($con, $_POST['group']);

 if($answer=="today")
 {

  //Query to select data from user_details table
  $result = mysqli_query($con,"SELECT Firstname, Lastname, Preferredname,DateofBirth,UserType FROM user_details WHERE DateofBirth like '%".$today."%'");
    //Today table
    echo "<table border='1'>
    <caption><h2>**Today's Birthdays**</h2></caption>
    <tr>
    <th>First name    </th>
    <th>Last name     </th>
    <th>Preffered name</th>
    <th>Date of Birth </th>
    <th>User Type     </th>
    <th>Age           </th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['Firstname']     . "</td>";
    echo "<td>" . $row['Lastname']      . "</td>";
    echo "<td>" . $row['Preferredname'] . "</td>";
    echo "<td>" . $row['DateofBirth']   . "</td>";
    echo "<td>" . $row['UserType']      . "</td>";

    echo "</tr>";
    }
    echo "</table>"; 
 }

 elseif($answer=="tomorrow")
 {
  $tomorrow = date("m-d", time() + 86400);
  $result = mysqli_query($con,"SELECT Firstname, Lastname, Preferredname,DateofBirth,UserType FROM user_details WHERE DateofBirth like '%".$tomorrow."%'");
    //tomorrow table
    echo "<table border='1'>
    <caption><h2>**Tomorrow's Birthdays**</h2></caption>
    <tr>
    <th>First name</th>
    <th>Last name</th>
    <th>Preffered name</th>
    <th>Date of Birth</th>
    <th>User Type</th>

    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['Firstname']     . "</td>";
    echo "<td>" . $row['Lastname']      . "</td>";
    echo "<td>" . $row['Preferredname'] . "</td>";
    echo "<td>" . $row['DateofBirth']   . "</td>";
    echo "<td>" . $row['UserType']      . "</td>";

    echo "</tr>";
    }
    echo "</table>"; 
 }

  elseif($answer=="datomorrow")
  {
   $datomorrow = date("m-d", time() + 172800);
   $result = mysqli_query($con,"SELECT Firstname, Lastname, Preferredname,DateofBirth,UserType FROM user_details WHERE DateofBirth like '%".$datomorrow."%'");
    //Day after tomorrow table
    echo "<table border='1'>
    <caption><h2>**Day After Tomorrow's Birthdays**</h2></caption>
    <tr>
    <th>First name    </th>
    <th>Last name     </th>
    <th>Preffered name</th>
    <th>Date of Birth </th>
    <th>User Type     </th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['Firstname']     . "</td>";
    echo "<td>" . $row['Lastname']      . "</td>";
    echo "<td>" . $row['Preferredname'] . "</td>";
    echo "<td>" . $row['DateofBirth']   . "</td>";
    echo "<td>" . $row['UserType']      . "</td>";

    echo "</tr>";
    }
    echo "</table>"; 
  }

  elseif($answer=="thisweek")
  {
   
   $result = mysqli_query($con,"SELECT * FROM user_details WHERE WEEK( DateofBirth ) = WEEK( NOW() )");
    //This week table
    echo "<table border='1'>
    <caption><h2>**This Week's Birthdays**</h2></caption>
    <tr>
    <th>First name    </th>
    <th>Last name     </th>
    <th>Preffered name</th>
    <th>Date of Birth </th>
    <th>User Type     </th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['Firstname']     . "</td>";
    echo "<td>" . $row['Lastname']      . "</td>";
    echo "<td>" . $row['Preferredname'] . "</td>";
    echo "<td>" . $row['DateofBirth']   . "</td>";
    echo "<td>" . $row['UserType']      . "</td>";

    echo "</tr>";
    }
    echo "</table>"; 
  }

  elseif($answer=="nxtweek")
  {
   
   $result = mysqli_query($con,"SELECT * FROM user_details WHERE WEEK( DateofBirth ) = WEEK( NOW() ) + 1");
    //next week table
    echo "<table border='1'>
    <caption><h2>**Next Week's Birthdays**</h2></caption>
    <tr>
    <th>First name    </th>
    <th>Last name     </th>
    <th>Preffered name</th>
    <th>Date of Birth </th>
    <th>User Type     </th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['Firstname']     . "</td>";
    echo "<td>" . $row['Lastname']      . "</td>";
    echo "<td>" . $row['Preferredname'] . "</td>";
    echo "<td>" . $row['DateofBirth']   . "</td>";
    echo "<td>" . $row['UserType']      . "</td>";

    echo "</tr>";
    }
    echo "</table>"; 
  }

  elseif($answer=="thismonth")
  {
   
   $result = mysqli_query($con,"SELECT * FROM user_details WHERE MONTH( DateofBirth ) = MONTH( NOW() )");
   //This month table
    echo "<table border='1'>
    <caption><h2>**This Month's Birthdays**</h2></caption>
    <tr>
    <th>First name    </th>
    <th>Last name     </th>
    <th>Preffered name</th>
    <th>Date of Birth </th>
    <th>User Type     </th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['Firstname']     . "</td>";
    echo "<td>" . $row['Lastname']      . "</td>";
    echo "<td>" . $row['Preferredname'] . "</td>";
    echo "<td>" . $row['DateofBirth']   . "</td>";
    echo "<td>" . $row['UserType']      . "</td>";

    echo "</tr>";
    }
    echo "</table>"; 
  }
 else
    {
      echo 'incorect';
    }
      mysqli_close($con);

   ?>
 </table><br><br>

<form method="GET" action="Userwork.php">
 <table>
  <?php
  //database connection
   require 'Db_connection.php';

   $events = mysqli_query($con,"SELECT name,datetime,venue,note,status FROM event ");
   //table to event details show
   echo "<table border='1'>
    <caption><h2>**Events**</h2></caption>
    <tr>
    <th>Name        </th>
    <th>Date & Time </th>
    <th>Venue       </th>
    <th>Notes       </th>
    <th>Status      </th>
    <th>Contribution</th>
    <th>Firstname and Lastname</th>
    <th>Change      </th>
    </tr>";

    while($row = mysqli_fetch_array($events))
    {
    echo "<tr>";
    echo "<td>" . $row['name']          . "</td>";
    echo "<td>" . $row['datetime']      . "</td>";
    echo "<td>" . $row['venue']         . "</td>";
    echo "<td>" . $row['note']          . "</td>";
    echo "<td>" . $row['status']        . "</td>";
    echo '<td><input type="radio" name="contri" value="Participate"/>Participate<input type="radio" name="contri" value="Absent"/>Absent</td>';
    echo '<td><input type="text" name="name" size="15" required="" /></td>&nbsp&nbsp';
    echo '<td> <a href=UserUI.php?edit='.$row['name'].'>Edit</a></td>';
    echo "</tr>";
    }
    echo "</table>"; 
   
  ?>
 </table><br>
 <button type="submit" name="submit">Confirm</button>
 </form>

 

</body>
</html>