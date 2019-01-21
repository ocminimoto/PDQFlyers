<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Sun, 11 Jan 2015 22:44:40 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Member Data Update Panel</title>
    
<style type="text/css">



</style>
    



  </head>
  <body>
<p><span style="FONT-SIZE: 20pt"><strong><font color="#0000ff">Update Request</font></strong></span></p>

<h3>Member Data Update</h3>



<div class="entries">
<?php
$maac = $_REQUEST['updater_maac'];
$lname = $_REQUEST['updater_lname'];


// set up key words so that if data base names or passwords change later, you only have to change them here 
$username="pdqf2438_PDQmbr";$password="chipmunk2";$database="pdqf2438_members";
// connect to the server and open the data base 
mysql_connect(localhost,$username,$password); @mysql_select_db($database) or die( "Unable to select database");

// get records with SQL query
$strSQL = "SELECT * FROM members WHERE maac = '$maac'";



/*
Execute the query and the recordset $rs contains the result
check to make sure that the query retrieved a real record
if it didn't, send a message to the operator and let him go back to the application screen to enter the correct MAAC number
*/

$rs = mysql_query($strSQL);
if(mysql_num_rows($rs)>0) {echo "Your MAAC number and last name have been used to access your personal information which is held in the Club's database.  
You may modify the fields that require change.";} 
else {echo "The MAAC number and last name combination you entered doesn't exist on our database.  "; 
die("Use the back arrow on your Browser to go back and correct your input.");}


// Loop the recordset $rs
// Each row will be made into an array ($row) using mysql_fetch_array
while($row = mysql_fetch_array($rs)) 

{
// Write the value of the column FirstName (which is now in the array $row)
$fname = $row['first_name'];
$lname = $row['last_name'];
$email = $row['email'];
$address = $row['address'];
$city = $row['city'];
$postal = $row['postal_code'];
$hphone = $row['home_phone'];
$mphone = $row['mobile_phone'];
}
?>

<form method="post" 
      action="data-write.php">
    

    <fieldset id="contact"> 
<legend>Contact Information</legend>
        <label>MAAC#:</label> <br><input size="12"
                  name="updater_maac" value = "<?php echo htmlspecialchars($maac); ?>" /><br>
<label>First Name:</label> <br><input size="30"
                  name="updater_fname" value = "<?php echo htmlspecialchars($fname); ?>" /><br>
<label>Last Name:</label> <br><input size="30"
                  name="updater_lname" value = "<?php echo htmlspecialchars($lname); ?>" /><br>
<label>eMail:</label> <br><input size="30"
                  name="updater_email" value = "<?php echo htmlspecialchars($email); ?>" /><br>
<label>Address:</label> <br><input size="30"
                  name="updater_address" value = "<?php echo htmlspecialchars($address); ?>" /><br>
<label>City:</label> <br><input size="30"
                  name="updater_city" value = "<?php echo htmlspecialchars($city); ?>" /><br>
<label>Postal Code:</label> <br><input size="7"
                  name="updater_PC" value = "<?php echo htmlspecialchars($postal); ?>" /><br>
<label>Home Phone:</label> <br><input size="12"
                  name="updater_hphone" value = "<?php echo htmlspecialchars($hphone); ?>" /><br>
<label>Mobile Phone:</label> <br><input size="12"
                  name="updater_mphone" value = "<?php echo htmlspecialchars($mphone); ?>" /><br>

    </fieldset>

    <button type="submit">
<img src="procede.jpg" width="50" height="50" alt="Submit Request" background:red;/>
 Update My Data</button>
</form>

<!php

// close the data base
mysql_close();
?>










<!--

-->
</div>

  </body>
</html>