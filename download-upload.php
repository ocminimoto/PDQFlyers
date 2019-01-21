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
table {border: 3px double green}
</style>

   
  </head>
  <body>
<p><span style="FONT-SIZE: 24pt"><strong><font color="#0000ff">Member Data Details</font></strong></span></p>

<h3>Member Data</h3>

<!--
This page is a private page for the Club Executive. Its purpose is to provide the membership data rquired to manage the Club.
-->

This page lists mambership data from our database and provides a print capability if required.  Prior to clicking on the Print button,
please ensure that you have changed your printer to landscape.<br><br>
<form>
<input type="button" value="Print this page" onClick="window.print()">
</form>

<div class="entries">

<?php

/* 
set up key words so that if data base names or passwords change later, you only have to change them here 
and connect to the server and open the data base
*/

$username="pdqf2438_PDQmbr";$password="chipmunk2";$database="pdqf2438_members"; 
mysql_connect(localhost,$username,$password); 
@mysql_select_db($database) or die( "Unable to open the database - contact the webmaster");

/*
set up and execute the query to get member's records - the recordset $rs contains the 2 dimensional array result
check to make sure that the query retrieved real records
if it didn't, send a message to the operator and let him go back to the application screen to enter the correct MAAC number
*/

$strSQL = "SELECT * FROM members ORDER BY last_name";
$rs = mysql_query($strSQL);
if(!mysql_num_rows($rs)>0) {echo "There was a problem accessing the database."; 
die("Use the back arrow on your Browser to go back and correct your input.");}

/* 
Access $rs with a loop
it extracts all the fields needed for one row of the table and then moves on to the next row.
th style="text-align:left"
*/
echo "<br><table border = 3><tr><th style='text-align:center'>MAAC</td><th style='text-align:center'>Name</td>";
echo "<th style='text-align:center'>email</td><th style='text-align:center'>Address</td><th style='text-align:center'>City</td><th style='text-align:center'>Postal Code</td>";
echo "<th style='text-align:center'>Home Phone</td><th style='text-align:center'>Mobile Phone</td><th style='text-align:center'>Year</td></tr>";

while($row = mysql_fetch_array($rs)) {
/*

*/


$maac = $row['MAAC'];
$lname = $row['last_name'];
$fname = $row['first_name'];
$email = $row['email'];
$address = $row['address'];
$city = $row['city'];
$postal = $row['postal_code'];
$hphone = $row['home_phone'];
$mphone = $row['mobile_phone'];
$myear = $row['membership_year'];
$mtype = $row['membership_type'];

if ($mtype <> 'F') {
if ($mtype = 'S') {$csocial += 1;} 
if ($mtype = 'J') {$cjunior += 1;} 
if ($mtype = 'A') {$cassociate += 1;}
}
ELSE {$full += 1;}

echo "<tr><td>$maac</td>";
echo "<td>$fname $lname</td>";
echo "<td>$email</td>";
echo "<td>$address</td>";
echo "<td>$city</td>";
echo "<td>$postal</td>";
echo "<td>$hphone</td>";
echo "<td>$mphone</td>";
echo "<td>$myear</td></tr>";
}
echo "$full, $csocial, $cjunior, $cassociate";
echo "</table>";

$download_str = "SELECT * FROM members OUTPUT TO 'c:\\test\\pdq-download-test.csv' FORMAT TEXT";

/*  The following member data fields are not needed for this report but are used in a sister program that is used by the web-master.

$member_since = $row['member_since'];
$mtype = $row['member_type'];
$appdate = $row['application_date'];
$myear = $row['membership_year'];
$hshot = $row['headshot'];
$xmtr = $row['transmitter'];
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
*/
?>

<!php
mysql_close();  // close the data base
?>

</div>
</body>
</html>