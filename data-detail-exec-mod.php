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
This page is a private page for the Club Executive. Its purpose is to provide the membership data required to manage the Club.
-->

<body>


<div class="noprint">  

<p><span style="color: #0000ff"><font size="5"><strong>Member Data Details</strong></font></span></p>
<font size "6">
<?php

// we need the current year so that we can get counts by membership year later
$currYear = date('Y');               //In the Fall, members will be looking to join for the following year, but after Jan 1, this will be the membership year for a while
$nextYear = $currYear + 1;
$lastYear = $currYear - 1;
$prevYear = "Past Members";
$currYearCnt = 0;
$nextYearCnt = 0;
$lastYearCnt = 0;
$prevYearCnt = 0;


// get the identification data that was passed to this program in the hidden form and make sure that the password is correct.
$maac = $_REQUEST['request_maac'];
$lname = $_REQUEST['request_lname'];
$data_pswd = $_REQUEST['request_password'];
$sort1 = $_REQUEST['sort1_key'];
$sort2 = $_REQUEST['sort2_key'];

// find out if all data is needed or just current year
if ($sort1 == "all_data")
    {
    $sort1 = "membership_year";
    $fullReport = "full";
    }

//the password is fixed.  For 2016 it is "verygood".
if ($data_pswd <> "verygood") {die("Your password is incorrect, use the back arrow on your Browser to go back and correct your input.");}

/* 
set up key words so that if data base names or passwords change later, you only have to change them here 
and connect to the server and open the data base
*/

$username="pdqf2438_PDQmbr";$password="chipmunk2";$database="pdqf2438_members"; 
$dbc = mysql_connect(localhost,$username,$password); 
@mysql_select_db($database) or die( "Unable to open the database - contact the webmaster");

/*
set up the query using the MAAC number that was passed
Execute the query to get the member's record - the recordset $rs will be a scalar array that contains the result
check to make sure that the query retrieved a real record
if it didn't, send a message to the operator and let him go back to the application screen to enter the correct MAAC number
*/

$strSQL = "SELECT * FROM members WHERE maac = '$maac'";
$rs = mysql_query($strSQL);

if(mysql_num_rows($rs) == '0') {echo "The MAAC number and last name combination you entered doesn't exist on our database.  "; 
die("Use the back arrow on your Browser to go back and correct your input.");}

while($row = mysql_fetch_array($rs)) {$last_name = $row['last_name'];}

/* need to change everything to lower case because sometimes people use upper case for some or all letters. */
$last_name = strtolower($last_name);
$lname = strtolower($lname);

if ($last_name <> $lname) {die("The MAAC number and last name combination you entered doesn't exist on our database. 
Use the back arrow on your Browser to go back and correct your input.");}

// end of php section

?> 

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

if ($sort1 == "membership_year") //sorting by membership year needs to be in descending order, the rest are ok with the default
    {
    $strSQL = "SELECT * FROM members ORDER BY membership_year DESC, $sort2";
    }
else
    {
    $strSQL = "SELECT * FROM members ORDER BY $sort1, $sort2";
    }

$rs = mysql_query($strSQL);
//Consider adding this code if there is ever a problem
//if(!mysql_num_rows($rs)>0) {echo "There was a problem accessing the database."; 
//die("Use the back arrow on your Browser to go back and correct your input.");}

/* 
Access $rs with a loop
it extracts all the fields needed for one row of the table and then moves on to the next row.
*/

echo "<br><table border = 3><tr><th style='text-align:center'>MAAC</td><th style='text-align:center'>Name</td><th style='text-align:center'>Type</td>";
echo "<th style='text-align:center'>email</td><th style='text-align:center'>Address</td><th style='text-align:center'>City</td><th style='text-align:center'>Postal Code</td>";
echo "<th style='text-align:center'>Home Phone</td><th style='text-align:center'>Mobile Phone</td><th style='text-align:center'>Year</td></tr>";

/* set up counters so that they print 0 if they need to */
$count = 0; $full = 0; $honorary = 0; $associate = 0; $junior = 0; $social = 0;

while($row = mysql_fetch_array($rs)) 
    {
    /*  get one member's data */
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
    $mtype = $row['member_type'];
    $instructor = $row['instructor'];

    $skipflag = "off"; 

    /*  add to the right counter */
    $count += 1;
    if ($mtype <> 'Full') 
        {
        if ($mtype == 'Social') {$social += 1; $mt ="Soc";} 
        if ($mtype == 'Junior') {$junior += 1; $mt ="Jr";} 
        if ($mtype == 'Honorary') {$honorary += 1; $mt ="Hon";}
        if ($mtype == 'Associate') {$associate += 1; $mt ="Assoc";}
        }
    else 
        {$full += 1; $mt ="Full";}
        
    // we need the count by year as well
        
    if ($myear == $currYear) {$currYearCnt += 1;}
        elseif ($myear == $nextYear){$nextYearCnt += 1;}
        elseif ($myear == $lastYear){ $lastYearCnt += 1;}
        elseif ($myear == "0000"){$inProcessCnt += 1;}
    else 
        {
        $prevYearCnt += 1;
        if ($fullReport <> "full") {$skipflag = "on";}
        }

    /*  fill out a row of the table */
    if ($skipflag == "off")
        {
        echo "<tr><td>$maac</td>";
        if ($instructor)
            {
            echo "<td><font color='#ff0000'>$fname $lname</font></td>";
            } 
        else
            {
            echo "<td>$fname $lname</td>";
            }
        echo "<td>$mt</td>";
        echo "<td>$email</td>";
        echo "<td>$address</td>";
        echo "<td>$city</td>";
        echo "<td>$postal</td>";
        echo "<td>$hphone</td>";
        echo "<td>$mphone</td>";
        echo "<td>$myear</td></tr>";
       }
    }

/*  print a report of the number of members found */

echo "Adult Members: $full<br>Honorary Members: $honorary<br>
Social Members: $social<br>Junior Members: $junior<br>Associate Members: $associate<br>In Process Members: $inProcessCnt<br>"
        . "<b>Members in our Database: $count</b><br><br>";
echo "Membership Year Breakdown:<br>$nextYear = $nextYearCnt<br>$currYear = $currYearCnt<br>$lastYear = $lastYearCnt<br>"
        . "$prevYear = $prevYearCnt <br>In Process Members = $inProcessCnt<br>";

echo "Instructor's names are highlighted in <font color='#ff0000'>red</font>.<br><br>";

$total_members = $full+$honorary+$social+$junior+$associate+$inProcessCnt;
if ($count <> $total_members) {echo "<b>Error in the member count.</b><br><br>";}

/*  print the table */
echo "</table>";

?>

<!php
mysql_close();  // close the data base
?>
</font>
</body>
</html>