<?php
 session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Organizer</title>
</head>
<body>
 <center>
 	<h1>Welcome Organizer&nbsp<?php echo $_SESSION['username'] ?></h1>
 </center>
   <button type="submit" name="event" onclick="window.location.href='http://localhost:8080/ClassTest/Event.php'">Create Event</button><br><br>

   <form method="POST" >

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
  //$from = new DateTime(mysqli_query($con,"SELECT DateofBirth FROM user_details"));
  //$to   = new DateTime('today');
  //$date = mysqli_query($con,"SELECT TIMESTAMPDIFF(YEAR,DateofBirth,CURDATE('y-m-d'))");
  //$now = new Date('Y-m-d');
  $answer=mysqli_real_escape_string($con, $_POST['group']);

 if($answer=="today")
 {


  $result = mysqli_query($con,"SELECT Firstname, Lastname, Preferredname,DateofBirth,UserType FROM user_details WHERE DateofBirth like '%".$today."%'");

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
    //echo "<td>" . $row['$date$from->diff($to)->y']         . "</td>";
    echo "</tr>";
    }
    echo "</table>"; 
 }

 elseif($answer=="tomorrow")
 {
  $tomorrow = date("m-d", time() + 86400);
  $result = mysqli_query($con,"SELECT Firstname, Lastname, Preferredname,DateofBirth,UserType FROM user_details WHERE DateofBirth like '%".$tomorrow."%'");

    echo "<table border='1'>
    <caption><h2>**Tomorrow's Birthdays**</h2></caption>
    <tr>
    <th>First name     </th>
    <th>Last name      </th>
    <th>Preffered name </th>
    <th>Date of Birth  </th>
    <th>User Type      </th>
    <th>Age            </th>
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

    echo "<table border='1'>
    <caption><h2>**Day After Tomorrow's Birthdays**</h2></caption>
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

  elseif($answer=="thisweek")
  {
   
   $result = mysqli_query($con,"SELECT * FROM user_details WHERE WEEK( DateofBirth ) = WEEK( NOW() )");

    echo "<table border='1'>
    <caption><h2>**This Week's Birthdays**</h2></caption>
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

  elseif($answer=="nxtweek")
  {
   
   $result = mysqli_query($con,"SELECT * FROM user_details WHERE WEEK( DateofBirth ) = WEEK( NOW() ) + 1");

    echo "<table border='1'>
    <caption><h2>**Next Week's Birthdays**</h2></caption>
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

  elseif($answer=="thismonth")
  {
   
   $result = mysqli_query($con,"SELECT * FROM user_details WHERE MONTH( DateofBirth ) = MONTH( NOW() )");

    echo "<table border='1'>
    <caption><h2>**This Month's Birthdays**</h2></caption>
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
 else
    {
      echo 'incorect';
    }
      mysqli_close($con);

   ?>
 </table>&nbsp&nbsp&nbsp
 
 <?php
 //database connection
 require 'Db_connection.php';
 //select query to obtain data from contribution table
  $par = mysqli_query($con,"SELECT Nic,Name,Participation FROM contribution");
  
  //table to show participation..
  echo "<center>";
  echo "<table>";
  echo "<table border='2'>
  <caption><h2>**Participation List**</h2></caption>
  <tr>
  <th>Nic</th>
  <th>Name of partipant</th>
  <th>Contribution</th>
  </tr>";
 
  while($row = mysqli_fetch_array($par))
  {
   echo "<tr>";
   echo "<td>". $row['Nic']            ."</td>";
   echo "<td>". $row['Name']           ."</td>";
   echo "<td>". $row['Participation']  ."</td>";
   echo "<tr>";
  }
   echo "</table>";
   echo "</center>";

 





 ?>
</body>
</html>