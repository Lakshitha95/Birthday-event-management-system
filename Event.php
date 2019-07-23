<?php
 session_start();
 include 'Eventcontrols.php';
 
  // fetch the record to be updated
 if (isset($_GET['edit'])) {
     $Id = $_GET['edit'];
     $edit_state = true;
     $rec = mysqli_query($con, "SELECT * FROM event WHERE Id='$Id'");
     $record = mysqli_fetch_array($rec);
     if (!$rec) {
     printf("Error: %s\n", mysqli_error($con));
     exit();
     }
     $nam  = $record['name']; 
     $date = $record['datetime'];
     $ven  = $record['venue'];
     $not  = $record['note'];
     $st   = $record['status'];
 }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Event Plan</title>
</head>
<body>
 
  <form method="POST" action="Eventcontrols.php">
  	<input type="hidden" name="Id" value="<?php echo $Id; ?>">
  	<label><h1>-Create event-</h1></label><br>
    
    <!--Text field-->
    <label>Name of The person :&nbsp</label>
    <input type="text" name="name" required="" value="<?php echo $nam; ?>"><br><br>

    <!--Date time picker-->
    <label>Date & Time :&nbsp</label>
    <input type="datetime-local" name="datetime" required="" value="<?php echo $date; ?>" ><br><br>

    <!--Text field-->
    <label>Venue :&nbsp</label>
    <input type="text" name="venue" required="" value="<?php echo $ven; ?>"><br><br>

    <!--Text field-->
    <label>Note :&nbsp</label>
    <input type="text" name="note" size="1000" required="" value="<?php echo $not; ?>"><br><br>
  
    <!--Radio button-->
    <label for="status" required="" value="<?php echo $st; ?>">Status : &nbsp</label>
    <input type="radio" name="status" value="Pending"   >Pending
    <input type="radio" name="status" value="Confirmed" >Confirmed
    <input type="radio" name="status" value="Celebrated">Celebrated
    <input type="radio" name="status" value="Cancelled" >Cancelled
    
    <br><br>
    <div><!--Change button(Save/Update) name according to the state-->
      <?php if ($edit_state == false):  ?> 
            <button type="submit" name="save">Save</button>&nbsp&nbsp
      <?php else: ?>
            <button type="submit" name="Update">Update</button>&nbsp&nbsp
      <?php endif   ?>
            <button type="reset">Reset</button>&nbsp&nbsp
    </div><br>
    
    

  </form>
    <button type="submit" name="cancel" onclick="window.location.href='http://localhost:8080/ClassTest/OrganizersUI.php'">Cancel</button>
    <br><br>

    <table><!--Table to the created event-->
    <thead>
      <tr>
      	<th>Name of The person</th>
        <th>Date & Time       </th>
        <th>Venue             </th>
        <th>Notes             </th>
        <th>Status            </th>
        <th colspan="2">Action</th>
      </tr>

    </thead>
    <tbody>
       <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
        <td><?php echo $row['name'];     ?></td>	
        <td><?php echo $row['datetime']; ?></td>
        <td><?php echo $row['venue'];    ?></td>
        <td><?php echo $row['note'];     ?></td>
        <td><?php echo $row['status'];   ?></td>
        <td>
          <a href="Event.php?edit=<?php echo $row['Id']; ?>">Edit</a>
        </td>&nbsp&nbsp
        <td>
          <a href="Eventcontrols.php?del=<?php echo $row['Id']; ?>">Delete</a>
        </td>
      </tr> 
    <?php   } ?>
    </table>

</body>
</html>

