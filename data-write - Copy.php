<!DOCTYPE html>
<html lang="en">
  <head>
<!--
No changes are needed for this module
-->

    <meta charset="utf-8">
    <title>Member Data Update Panel</title>

<!--
need the PDQ Flyers logo at the top
-->

<img src="http://www.pdqflyers.com/PDQ-banner.jpg"/>
<style type = "text/CSS";>
.hide {display:none;}
</style>

  </head>
  <body>
<!--
This page is invoked by data-updater.php.  It has two functions: check to see that required data is present and update anything that has changed.
  
When the operator has pressed the "Update my Data" button, all of the fields are compared to the database values (except the MAAC number and last name) are replaced in the database if different.
The MAAC number and last name have to be inserted or changed manually using phpMySQL in the HostPapa cPanel.
-->

<p><span style="FONT-SIZE: 24pt"><strong><font color="#0000ff">Member Data Update Results</font></strong></span></p>

<h3>Member Data Report</h3>


<div class="entries">
<?php

/*
First step is to retrieve all of the Member's data fields that were collected in data-updater.php
*/

$maac = $_REQUEST['updater_maac'];
$lname = $_REQUEST['updater_lname'];

$new_fname = $_REQUEST['updater_fname'];
$new_email = $_REQUEST['updater_email'];
$new_address = $_REQUEST['updater_address'];
$new_city = $_REQUEST['updater_city'];
$new_postal = $_REQUEST['updater_PC'];
$new_hphone = $_REQUEST['updater_hphone'];
$new_mphone = $_REQUEST['updater_mphone'];
$new_member_since = $_REQUEST['updater_msince'];
$new_instructor = $_REQUEST['updater_instructor'];
	if ($new_instructor == "on") {$new_instructor = 1;} ELSE {$new_instructor = 0;}
$new_p_name = $_REQUEST['updater_pname'];
	if ($new_p_name == "on") {$new_p_name = 1;} ELSE {$new_p_name = 0;}
$new_p_address = $_REQUEST['updater_paddress'];
	if ($new_p_address == "on") {$new_p_address = 1;} ELSE {$new_p_address = 0;}
$new_p_phone = $_REQUEST['updater_pphone'];
	if ($new_p_phone == "on") {$new_p_phone = 1;} ELSE {$new_p_phone = 0;}
$new_p_photo = $_REQUEST['updater_pphoto'];
	if ($new_p_photo == "on") {$new_p_photo = 1;} ELSE {$new_p_photo = 0;}
$new_g_aero = $_REQUEST['updater_aero'];
	if ($new_g_aero == "on") {$new_g_aero = 1;} ELSE {$new_g_aero = 0;}
$new_g_heli = $_REQUEST['updater_heli'];
	if ($new_g_heli == "on") {$new_g_heli = 1;} ELSE {$new_g_heli = 0;}
$new_g_indoor = $_REQUEST['updater_indoor'];
	if ($new_g_indoor == "on") {$new_g_indoor = 1;} ELSE {$new_g_indoor = 0;}
$new_g_float = $_REQUEST['updater_float'];
	if ($new_g_float == "on") {$new_g_float = 1;} ELSE {$new_g_float = 0;}

/*
Next job is to make sure that required fields are present and, if not, abort
*/

if ($new_fname == NULL) {die ("First Name is a required field, please use your browser's back arrow key to enter that information.");}
if ($new_email == NULL) {die ("eMail is a required field, please use your browser's back arrow key to enter that information.");}
if ($new_address == NULL) {die ("Address is a required field, please use your browser's back arrow key to enter that information.");}
if ($new_city == NULL) {die ("City is a required field, please use your browser's back arrow key to enter that information.");}
if ($new_postal == NULL) {die ("Postal Code is a required field, please use your browser's back arrow key to enter that information.");}


/* 
set up key words so that if data base names or passwords change later, you only have to change them here 
and connect to the server and open the data base
*/

$username="pdqf2438_PDQmbr";$password="chipmunk2";$database="pdqf2438_members"; 
$conn = mysql_connect(localhost,$username,$password); 
@mysql_select_db($database) or die( "Unable to open the database - contact the webmaster");

/*
We need the database version of each field so that we can see if the operator has enered a different value
*/

$strSQL = "SELECT * FROM members WHERE maac = '$maac'";
$rs = mysql_query($strSQL);

/* 
I didn't know how to just access $rs, so I used loop through code I already had to loop through $rs
it only does one loop, but gives up what we need
extract all of the member's data into variables for easy access later.
*/

while($row = mysql_fetch_array($rs)) 
{
$fname = $row['first_name'];
$lname = $row['last_name'];
$email = $row['email'];
$address = $row['address'];
$city = $row['city'];
$postal = $row['postal_code'];
$hphone = $row['home_phone'];
$mphone = $row['mobile_phone'];
$member_since = $row['member_since'];
$instructor = $row['instructor'];
$p_name = $row['p_name'];
$p_address = $row['p_address'];
$p_phone = $row['p_phone'];
$p_photo = $row['p_photo'];
$g_aero = $row['g_aero'];
$g_heli = $row['g_heli'];
$g_indoor = $row['g_indoor'];
$g_float = $row['g_float'];
}

/*
For each data element, check to see if the operator has requested a change and, 
if yes, update that field on the database and report to the operator.
Firstly, get the database version, then deal with each field
*/

if ($fname <> $new_fname) {$changes_made = TRUE;
$sql = "UPDATE members SET fname = '$new_fname' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
echo "<br>First Name changed, database value: $fname, new value: $new_fname";}

if ($email <> $new_email) {$changes_made = TRUE;
$sql = "UPDATE members SET email = '$new_email' WHERE MAAC = '$maac'";
$result = mysql_query($sql, $conn);
echo "<br>eMail changed, database value: $email, new value: $new_email";}

if ($address <> $new_address) {$changes_made = TRUE;
$sql = "UPDATE members SET address = '$new_address ' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
echo "<br>Address change made, database value: $address , new value: $new_address";}

if ($city <> $new_city) {$changes_made = TRUE;
$sql = "UPDATE members SET city = '$new_city' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
echo "<br>City change made, database value: $city, new value: $new_city";}

if ($postal <> $new_postal) {$changes_made = TRUE;
$sql = "UPDATE members SET postal_code = '$new_postal' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
echo "<br>Postal Code change made, database value: $postal, new value: $new_postal";}

if ($hphone <> $new_hphone) {$changes_made = TRUE;
$sql = "UPDATE members SET home_phone = '$new_hphone' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
echo "<br>Home Phone changed, database value: $hphone, new value: $new_hphone";}

if ($mphone <> $new_mphone) {$changes_made = TRUE;
$sql = "UPDATE members SET mobile_phone = '$new_mphone' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
echo "<br>Mobile Phone changed, database value: $mphone, new value: $new_mphone";}

if ($member_since <> $new_member_since) {$changes_made = TRUE;
$sql = "UPDATE members SET member_since = '$new_member_since' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
echo "<br>Member Since year has been changed, database value: $member_since, new value: $new_member_since";}

if ($instructor <> $new_instructor) {$changes_made = TRUE;
$sql = "UPDATE members SET instructor = '$new_instructor' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
if ($new_instructor) {echo "<br>Instructor flag set on";} ELSE {echo "<br>Instructor flag set off";}}

if ($p_name <> $new_p_name) {$changes_made = TRUE;
$sql = "UPDATE members SET p_name = '$new_p_name' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
if ($new_p_name) {echo "<br>Name Privacy flag set on";} ELSE {echo "<br>Name Privacy flag set off";}}

if ($p_address <> $new_p_address) {$changes_made = TRUE;
$sql = "UPDATE members SET p_address = '$new_p_address' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
if ($new_p_address) {echo "<br>Address Privacy flag set on";} ELSE {echo "<br>Address Privacy flag set off";}}

if ($p_phone <> $new_p_phone) {$changes_made = TRUE;
$sql = "UPDATE members SET p_phone = '$new_p_phone' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
if ($new_p_phone) {echo "<br>Phone Privacy flag set on";} ELSE {echo "<br>Phone Privacy flag set off";}}

if ($p_photo <> $new_p_photo) {$changes_made = TRUE;
$sql = "UPDATE members SET p_photo = '$new_p_photo' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
if ($new_p_photo) {echo "<br>Photo Privacy flag set on";} ELSE {echo "<br>Photo Privacy flag set off";}}

if ($g_float <> $new_g_float) {$changes_made = TRUE;
$sql = "UPDATE members SET g_float = '$new_g_float' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
if ($new_g_float) {echo "<br>Float Flying Interest Group flag set on";} ELSE {echo "<br>Float Flying Interest Group flag set off";}}

if ($g_indoor <> $new_g_indoor) {$changes_made = TRUE;
$sql = "UPDATE members SET g_indoor = '$new_g_indoor' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
if ($new_g_indoor) {echo "<br>Indoor Flying Interest Group flag set on";} ELSE {echo "<br>Indoor Flying Interest Group flag set off";}}

if ($g_heli <> $new_g_heli) {$changes_made = TRUE;
$sql = "UPDATE members SET g_heli = '$new_g_heli' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
if ($new_g_heli) {echo "<br>Helicopter Interest Group flag set on";} ELSE {echo "<br>Helicopter Interest Group flag set off";}}

if ($g_aero <> $new_g_aero) {$changes_made = TRUE;
$sql = "UPDATE members SET g_aero = '$new_g_aero' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
if ($new_g_aero) {echo "<br>Aerobatics Interest Group flag set on";} ELSE {echo "<br>Aerobatics Interest Group flag set off";}}



if ($changes_made) {echo "<br>The changes listed above have been made to your data.";} 
Else {echo "No changes have been made to your data.";}

mysql_close();  // close the data base
?>


<br><br><h3>Membership Application (optional)</h3>

<p>If you would like to apply for or renew your Membership Card, click on the button below, otherwise, close this window.</>


<br><br>


<form method="post" 
      action="membership-app.php">

<fieldset id="keys" class ="hide"> 


<label>MAAC#: *</label> <br><input size="12"
                  name="apply_maac" value = "<?php echo htmlspecialchars($maac); ?>" /><br>
<label>Last Name: *</label> <br><input size="30"
                  name="apply_lname" value = "<?php echo htmlspecialchars($lname); ?>" /><br>
<label>First Name: *</label> <br><input size="12"
                  name="apply_fname" value = "<?php echo htmlspecialchars($fname); ?>" /><br>
<label>eMail: *</label> <br><input size="12"
                  name="apply_email" value = "<?php echo htmlspecialchars($email); ?>" /><br>
<label>Address: *</label> <br><input size="12"
                  name="apply_address" value = "<?php echo htmlspecialchars($address); ?>" /><br>
<label>City: *</label> <br><input size="12"
                  name="apply_city" value = "<?php echo htmlspecialchars($city); ?>" /><br>
<label>Postal Code: *</label> <br><input size="12"
                  name="apply_postal" value = "<?php echo htmlspecialchars($postal); ?>" /><br>
 </fieldset>


<button type="submit">
<img src="procede.jpg" width="50" height="50" alt="Submit Request" />
 Apply for Membership Card</button>
</form>




</div>
</body>
</html>