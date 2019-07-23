<?php
 //session_start();
 include 'AdminControls.php';

 // fetch the record to be updated
 if (isset($_GET['edit'])) {
     $nic = $_GET['edit'];
     $edit_state = true;
     $rec = mysqli_query($con, "SELECT * FROM administrators WHERE Nic='$nic'");
     $record = mysqli_fetch_array($rec);
     if (!$rec) {
     printf("Error: %s\n", mysqli_error($con));
     exit();
}
     $select = $record['UserType'];
     $nic = $record['Nic'];
     $pass = $record['password'];
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
 <center>
 	<h1>Welcome Admin&nbsp<?php echo $_SESSION['username'] ?></h1>
 </center>
  
   <?php if (isset($_SESSION['msg'])): ?>
       <div>
         <?php
           echo $_SESSION['msg'];
           unset($_SESSION['msg']);
         ?>
       </div>
   <?php endif ?>

  <table>

    <thead>
      <tr>
        <th>User type</th>
        <th>NIC</th>
        <th>Password</th>
        <th colspan="2">Action</th>
      </tr>

    </thead>
    <tbody>
       <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
        <td><?php echo $row['UserType']; ?></td>
        <td><?php echo $row['Nic']; ?></td>
        <td><?php echo $row['password']; ?></td>
        <td>
          <a href="AdminUI.php?edit=<?php echo $row['Nic']; ?>">Edit</a>
        </td>&nbsp&nbsp
        <td>
          <a href="AdminControls.php?del=<?php echo $row['Nic']; ?>">Delete</a>
        </td>
      </tr> 
    <?php   } ?>

      
    </tbody>
   
  </table><br><br><br>

  <form method="POST" action="AdminControls.php">
  <input type="hidden" name="nic" value="<?php echo $nic; ?>">
    <div class="input-group">
      <select name="select" required="" value="<?php echo $select; ?>" >
         <option value="Orgenizer"    >Orgenizer</option>
         <option value="SystemAdmin"  >System Admin</option>
       </select>

    </div><br>
    <div class="input-group">
      <label>NIC :&nbsp</label>
      <input type="text" name="NIC" required="" value="<?php echo $nic; ?>">
    </div><br> 
    <div>
      <label>Password :&nbsp</label>
      <input type="Password" name="Password" required="" value="<?php echo $pass; ?>">
    </div><br>
    <div>
      <?php if ($edit_state == false):  ?> 
            <button type="submit" name="save">Save</button>
      <?php else: ?>
            <button type="submit" name="Update">Update</button>
      <?php endif   ?>
          
    </div><br>
  </form>

</body>
</html>