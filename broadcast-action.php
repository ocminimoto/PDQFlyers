<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>Membership Request Processing</title>

<!--
need the PDQ Flyers logo at the top  
-->

<img src="http://www.pdqflyers.com/PDQ-banner.jpg"/>
<style type = "text/CSS";>
.hide {display:none;}
</style>
</head>

<body>
    <p><span style="color: #0000ff"><font size="5"><strong>Membership Broadcast Request Report</strong></font></span></p>
    
    <font size ="4">
<?php
/* 
This page is invoked because the Form operator was used in member-broadcast.php
It's purpose is to take the parameters that were filled into the form's fields and build and send an email
Firstly, get the parameters that were passed when the send action was taken

If the client wants a message to the whole group, a password is required and it has to be changed every January.
 */
$currentpswd = 'nokidding';

$e_mail = $_REQUEST["from_email"];        //this will be the From:
$email = strtolower ($e_mail);            //just in case some of the letters are upper case
$password = $_REQUEST["clubpswd"];       //this year its "nokidding"
$mail_on = $_REQUEST["send_mail"];       //do we send an email?
$list = $_REQUEST["list"];               //none, comma, or straight
$group = $_REQUEST["group"];             //which special interest group - club,indoor,floats,heli,or scale
$message = $_REQUEST["message"];
$subject = $_REQUEST["subject"];


if ($group == "club") {if ($password <> $currentpswd) {die ("Please use your browsers back arrow to correct the password.");}}

$wanted = "no";

/* 
Database retrieval:
 * This section of code loops through the Membership database collecting names and email addresses. 
 * It will create a full name from first/last in order to report who the email was sent to and check to ensure that the sender's email is included.  
 * If it is not, or if the password is incorrect, an error message occurs on the broadcast-action.php page.  
 * Note that password is not required for special interest groups.
Logic: 
 * 1. open the database and set up to issue the query for the needed records 
 * 2. get the names and email addresses from the data base where the
interest group matches (for the Club broadcast, all records will be retrieved.
 * 3. set $validemail to false, then loop through email addresses adding them to the distribution list plus changing $validemail to true
when a match is found and, on each record, creating the full name list 
*/

// Set up key words so that if data base names or passwords change later, you only have to change them here 
$username="pdqf2438_PDQmbr";
$pswd="chipmunk2";
$data_base="pdqf2438_members";

// connect to the server and open the data base 
$connection = mysql_connect(localhost,$username,$pswd);mysql_select_db($data_base) or die( "Unable to select database");

$validemail = FALSE;  //this flag will be set to true when the sender's email is found in the interest group
$strSQL = "SELECT * FROM members ORDER BY first_name";  // set up the SQL query
$rs = mysql_query($strSQL);  // Execute the query - the recordset $rs will contain the result - an array of all our data in rows of members
    
// Loop through the recordset $rs - each member's data will be made into an one dimentional array ($row) using mysql_fetch_array

while($row = mysql_fetch_array($rs)) {

$fname = $row['first_name'];
$lname =  $row['last_name'];
$me_mail = $row['email'];
$memail = strtolower ($me_mail);
$general = $row['g_general'];
$float = $row['g_float'];
$indoor = $row['g_indoor'];
$heli = $row['g_heli'];
$scale = $row['g_scale'];



/* only add to $broadcast if it's the whole club or the g_type matches the request and only add the comma if it's a csv list requested */


if ($general == 1) {$general = "general";} ELSE {$general = " ";}
if ($float == 1) {$float = "floats";} ELSE {$float = " ";}
if ($indoor == 1) {$indoor = "indoor";} ELSE {$indoor = " ";}
if ($heli == 1) {$heli = "heli";} ELSE {$heli = " ";}
if ($scale == 1) {$scale = "scale";} ELSE {$scale = " ";}


if ($group == "club") {$wanted = "yes";}
if ($group == $general) {$wanted = "yes";}
if ($group == $float) {$wanted = "yes";}
if ($group == $indoor) {$wanted = "yes";}
if ($group == $heli) {$wanted = "yes";}
if ($group == $scale) {$wanted = "yes";}

if (!$memail) {$wanted = "no";}              //get rid of null emails


if ($wanted == "yes") 
{
    if ($email == $memail) {$validemail = TRUE;}
$sendername = "$fname $lname";
if ($list == "comma") {if ($mailist) {$mailist .= ",";}}
$mailist .= "<br>";
$mailist .= "$sendername";
$mailist .= "&lt";
$mailist .= "$memail";
$mailist .= "&gt";

if ($broadcast) {$broadcast .= ",";}
$broadcast .= "$memail";

$wanted = "no";                                //set up for next record
}}

// Now we have to decide whether or not to send the email or print the list

if (!$validemail) {die ("You must be a member of this Interest Group to list or send a broadcast email to them.");}
 
if ($mail_on) 
    {
    $headers = "From: ".$email."\r\n";
    if ($group == "club") 
        {
        $headers .= "BCC: ".$broadcast."\r\n";
        }
    else
        {
        $headers .= "CC: ".$broadcast."\r\n";
        }
    $result = mail($email, $subject, $message, $headers);

    if ($result) 
        {
        echo "<p>Your email to the $group group was successful.</p>";
        } 
    ELSE 
        {
        die ("<p>Mail delivery failed, please use your browsers back arrow to check for input errors.
        If you cannot determine the problem, please contact the webmaster for assistance.</p>");
        }
    } 

if ($list <> "none") {echo "<p>To use this list to send a message of your own, select it and copy it, then paste it into your email's To: box.<p>$mailist</p>";}

// close the data base
mysql_close();
?> 
    </font>
</body>

</html>



