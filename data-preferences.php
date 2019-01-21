<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Member Data Information Sheet</title>


<!-- include the PDQ Flyers logo -->
<img src="http://www.pdqflyers.com/PDQ-banner.jpg"/>

<!-- 
style doesn't like to have comments inside it's boundaries!!

like to see a green double line border around the table

these next 3 commands control what is seen on the screen and what on the printed output.  The 2 outputs need to be different. 
#print-button {display: none;}   - this was used during testing

-->
<style type="text/css">

table {border: 3px double green}
@media print {.noprint {display:none;}}
@media screen {.nosee {display:none;}}

</style>

</head>

<!--
This page is used to provide the membership preferences so that the Member pages and photographs can be managed.
-->

<body>


<div class="noprint">  

<p><span style="color: #0000ff"><font size="5"><strong>Member Data Details</strong></font></span></p>
<font size "6">


<p><big>
This page lists membership data from our database and provides a print capability if required.<br>Prior to clicking on the Print button,
please ensure that you have changed your printer to landscape.<br><br></big></p> 



<!-- the next few lines set up the Print button -->
<a href="javascript:window.print()"><img src="print.jpg" width="120" height="60" alt="print this page" id="print-button" /></a>

</div>

<div class="nosee">  <!--  this area won't be seen on the screen -->

<p><span style="color: #0000ff"><font size="5"><strong>Member Data Details</strong></font></span></p>
<br><br>

</div>

<?php

$username="pdqf2438_PDQmbr";$password="chipmunk2";$database="pdqf2438_members"; 
$dbc = mysql_connect(localhost,$username,$password); 
@mysql_select_db($database) or die( "Unable to open the database - contact the webmaster");

    $strSQL = "SELECT * FROM members ORDER BY first_name, last_name";

$rs = mysql_query($strSQL);

/* 
Access $rs with a loop
it extracts all the fields needed for one row of the table and then moves on to the next row.
*/

echo "<br><table border = 3><tr><th style='text-align:center'>MAAC</td><th style='text-align:center'>Name</td><th style='text-align:center'>Type</td>";
echo "<th style='text-align:center'>email</td><th style='text-align:center'>Have Headshot</td><th style='text-align:center'>No Member Page</td><th style='text-align:center'>No Photo</td>";
echo "<th style='text-align:center'>Year</td>";
echo "<th style='text-align:center'>General</td>";
echo "<th style='text-align:center'>Float</td>";
echo "<th style='text-align:center'>Indoor</td>";
echo "<th style='text-align:center'>Heli</td>";
echo "<th style='text-align:center'>Scale</td></tr>";


/* set up counters so that they print 0 if they need to */
$count = 0; $full = 0; $honorary = 0; $associate = 0; $junior = 0; $social = 0;

while($row = mysql_fetch_array($rs)) 
    {
    /*  get one member's data */
    $maac = $row['MAAC'];
    $lname = $row['last_name'];
    $fname = $row['first_name'];
    $email = $row['email'];
    $headshot = $row['headshot'];
    $ggeneral = $row['g_general'];
    $gfloat = $row['g_float'];
    $gindoor = $row['g_indoor'];
    $gheli = $row['g_heli'];
    $gscale = $row['g_scale'];

    if ($headshot == "1") {$headshot = "  ";} else {$headshot = "Need Photo";}
    $photo = $row['p_photo'];
    if ($photo == "1") {$photo = "No Photo";} else {$photo = "  ";}
    $memberpage = $row['p_name'];
    if ($memberpage == "1") {$memberpage = "No Page";} else {$memberpage = "  ";}
    $hphone = $row['home_phone'];
    $mphone = $row['mobile_phone'];
    $myear = $row['membership_year'];
    $mtype = $row['member_type'];
if ($ggeneral == "1") {$ggeneral = "Y";} else {$ggeneral = "  ";}
if ($gfloat == "1") {$gfloat = "Y";} else {$gfloat = "  ";}
if ($gindoor == "1") {$gindoor = "Y";} else {$gindoor = "  ";}
if ($gheli == "1") {$gheli = "Y";} else {$gheli = "  ";}
if ($gscale == "1") {$gscale = "Y";} else {$gscale = "  ";}
 
    

    /*  fill out a row of the table */
    echo "<tr><td>$maac</td>";
    echo "<td>$fname $lname</td>";
    echo "<td>$mt</td>";
    echo "<td>$email</td>";
    echo "<td>$headshot</td>";
    echo "<td>$memberpage</td>";
    echo "<td>$photo</td>";
    echo "<td>$myear</td>";
    echo "<td>$ggeneral</td>";
    echo "<td>$gfloat</td>";
    echo "<td>$gindoor</td>";
    echo "<td>$gheli</td>";
    echo "<td>$gscale</td></tr>";
    }


echo "</table>";

?>

<!php
mysql_close();  // close the data base
?>
</font>
</body>
</html>