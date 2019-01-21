<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>Member Data Update Panel</title>

<!-- for notes on the button below, see data-updater.php -->
<img src="http://www.pdqflyers.com/PDQ-banner.jpg"/>
<style type = "text/CSS";>
.hide {display:none;}

button {
   border: 1px solid #0a3c59;
   background: #4d7c8a;
   background: -webkit-gradient(linear, left top, left bottom, from(#a2e8aa), to(#4d7c8a));
   background: -webkit-linear-gradient(top, #a2e8aa, #4d7c8a);
   background: -moz-linear-gradient(top, #a2e8aa, #4d7c8a);
   background: -ms-linear-gradient(top, #a2e8aa, #4d7c8a);
   background: -o-linear-gradient(top, #a2e8aa, #4d7c8a);
   background-image: -ms-linear-gradient(top, #a2e8aa 0%, #4d7c8a 100%);
   padding: 10.5px 21px;
   -webkit-border-radius: 6px;
   -moz-border-radius: 6px;
   border-radius: 6px;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   text-shadow: #7ea4bd 0 1px 0;
   color: #010305;
   font-size: 14px;
   font-family: helvetica, serif;
   text-decoration: none;
   vertical-align: middle;
   }
button:hover {
   border: 1px solid #0a3c59;
   text-shadow: #1e4158 0 1px 0;
   background: #3e779d;
   background: -webkit-gradient(linear, left top, left bottom, from(#46a887), to(#3e779d));
   background: -webkit-linear-gradient(top, #46a887, #3e779d);
   background: -moz-linear-gradient(top, #46a887, #3e779d);
   background: -ms-linear-gradient(top, #46a887, #3e779d);
   background: -o-linear-gradient(top, #46a887, #3e779d);
   background-image: -ms-linear-gradient(top, #46a887 0%, #3e779d 100%);
   color: #fff;
   }
button:active {
   text-shadow: #1e4158 0 1px 0;
   border: 1px solid #0a3c59;
   background: #65a9d7;
   background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#3e779d));
   background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
   background: -moz-linear-gradient(top, #3e779d, #65a9d7);
   background: -ms-linear-gradient(top, #3e779d, #65a9d7);
   background: -o-linear-gradient(top, #3e779d, #65a9d7);
   background-image: -ms-linear-gradient(top, #3e779d 0%, #65a9d7 100%);
   color: #fff;
   }
</style>

  </head>
  <body>
<!--
This page is invoked by data-updater.php.  
It has three functions: check to see that required data is present, update anything that has changed, and then, if the member wishes, apply for membership.
  
When the operator has pressed the "Update my Data" button, all of the fields are compared to the database values (except the MAAC number and last name) are replaced in the database if different.
The MAAC number and last name have to be inserted or changed manually using phpMySQL in the HostPapa cPanel.

Finally, if the member fills in data in the application and presses "submit", control is transferred to app-submit.php to process the application.
-->

<p><span style="FONT-SIZE: 24pt"><strong><font color="#0000ff">Member Data Update Results and Membership Application</font></strong></span></p>

<h3>Member Data Report</h3>


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
$new_myear = $_REQUEST['updater_myear'];
$new_mtype = $_REQUEST['updater_mtype'];
$new_mpswd = $_REQUEST['updater_mpswd'];
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
$new_g_general = $_REQUEST['updater_general'];
	if ($new_g_general == "on") {$new_g_general = 1;} ELSE {$new_g_general = 0;}
$new_g_scale = $_REQUEST['updater_scale'];
	if ($new_g_scale == "on") {$new_g_scale = 1;} ELSE {$new_g_scale = 0;}
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

/* Make sure that the email entered is valid */
if (! filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
    die ("This email address is not valid.  Please use your browsers back arrow key to correct it.");
}

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
$rs is a scalar array so I just loop through code.
It only does one loop, but gives us what we need.
Extract all of the member's data into variables for easy access later.
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
$membership_year = $row['membership_year'];
$member_type = $row['member_type'];
$instructor = $row['instructor'];
$p_name = $row['p_name'];
$p_address = $row['p_address'];
$p_phone = $row['p_phone'];
$p_photo = $row['p_photo'];
$g_general = $row['g_general'];
$g_scale = $row['g_scale'];
$g_heli = $row['g_heli'];
$g_indoor = $row['g_indoor'];
$g_float = $row['g_float'];
}

/* check to see if the membership-year has been changed.  If it has, it needs the correct password, otherwise return to sender. 
Change the password every year */

if ($membership_year <> $new_myear)
    {
    if ($new_mpswd <> "timsaysok") 
        {
        die ("you cannot change the Membership Year without the correct password");
        } 
    else 
        {
        $changes_made = TRUE;
        $sql = "UPDATE members SET membership_year = '$new_myear' WHERE maac = '$maac'";
        $result = mysql_query($sql, $conn);
        echo "<br>Membership Year changed, database value: $membership_year, new value: $new_myear";
        }
    }
/* do the same for the member typoe */
if ($member_type <> $new_mtype)
    {
    if ($new_mpswd <> "timsaysok") 
        {
        die ("you cannot change the Membership Type without the correct password");
        } 
    else 
        {
        $changes_made = TRUE;
        $sql = "UPDATE members SET member_type = '$new_mtype' WHERE maac = '$maac'";
        $result = mysql_query($sql, $conn);
        echo "<br>Member Type changed, database value: $member_type, new value: $new_mtype";
        
        }
    }

/*
For each data element, check to see if the operator has requested a change and, 
if yes, update that field on the database and report to the operator.
Firstly, get the database version, then deal with each field
*/

if ($fname <> $new_fname) {$changes_made = TRUE;
$sql = "UPDATE members SET first_name = '$new_fname' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
echo "<br>First Name changed, database value: $fname, new value: $new_fname";}
$fname = $new_fname;

if ($email <> $new_email) {$changes_made = TRUE;
$sql = "UPDATE members SET email = '$new_email' WHERE MAAC = '$maac'";
$result = mysql_query($sql, $conn);
echo "<br>eMail changed, database value: $email, new value: $new_email";}
$email = $new_email;

if ($address <> $new_address) {$changes_made = TRUE;
$sql = "UPDATE members SET address = '$new_address ' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
echo "<br>Address change made, database value: $address , new value: $new_address";}
$address = $new_address;

if ($city <> $new_city) {$changes_made = TRUE;
$sql = "UPDATE members SET city = '$new_city' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
echo "<br>City change made, database value: $city, new value: $new_city";}
$city = $new_city;

if ($postal <> $new_postal) {$changes_made = TRUE;
$sql = "UPDATE members SET postal_code = '$new_postal' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
echo "<br>Postal Code change made, database value: $postal, new value: $new_postal";}
$postal = $new_postal;

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

/* if privacy name or privacy photo are changed, the Webmaster has to do something, so send an email */
if ($p_name <> $new_p_name)         //has there been a change to the name privacy flag?
    {
    $changes_made = TRUE;
    $sql = "UPDATE members SET p_name = '$new_p_name' WHERE maac = '$maac'";
    $result = mysql_query($sql, $conn);
    if ($new_p_name)                //is the flag to be set on?
        {
        echo "<br>Name Privacy flag set on. The webmaster will be asked to remove your Member Page and contact you when that is done.";
        
        /* send an email to the webmaster to ask for a new Member Page */
        $message = "$fname $lname has requested that his Member Page be removed.";
        $message .= "\r\n\rCould you please do that for him?";
        $message .= "\r\n\rThank you.";
        $to      = "webmaster@pdqflyers.com";
        $subject = "Member Page Application for $fname $lname";
        $headers = "From: webmaster@pdqflyers.com";
        $result = mail($to, $subject, $message, $headers); 
        } 
    else 
        {
        echo "<br>Name Privacy flag set off. The webmaster will be asked to set up a Member Page for you and contact you when that is done.";
        
        /* send an email to the webmaster to ask to remove a Member Page */
        $message = "$fname $lname has requested a new Member Page.";
        $message .= "\r\n\rCould you please create one for him?";
        $message .= "\r\n\rThank you.";
        $to      = "webmaster@pdqflyers.com";
        $subject = "Member Page Application for $fname $lname";
        $headers = "From: webmaster@pdqflyers.com";
        $result = mail($to, $subject, $message, $headers);
        }
    }

if ($p_address <> $new_p_address) {$changes_made = TRUE;
$sql = "UPDATE members SET p_address = '$new_p_address' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
if ($new_p_address) {echo "<br>Address Privacy flag set on";} ELSE {echo "<br>Address Privacy flag set off";}}

if ($p_phone <> $new_p_phone) {$changes_made = TRUE;
$sql = "UPDATE members SET p_phone = '$new_p_phone' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
if ($new_p_phone) {echo "<br>Phone Privacy flag set on";} ELSE {echo "<br>Phone Privacy flag set off";}}

if ($p_photo <> $new_p_photo)         //has there been a change to the name headshot flag?
    {
    $changes_made = TRUE;
    $sql = "UPDATE members SET p_photo = '$new_p_photo' WHERE maac = '$maac'";
    $result = mysql_query($sql, $conn);
    if ($new_p_photo)                //is the flag to be set on?
        {
        echo "<br>Photo Privacy flag set on. The webmaster will be asked not to include your headshot on the Member Photo Page.";
        
        /* send an email to the webmaster to ask that a headshot not be included on the Member Photo Page */
        $message = "$fname $lname has requested that his head shot be removed from the Member Photo page.";
        $message .= "\r\n\rCould you please do that for him?";
        $message .= "\r\n\rThank you.";
        $to      = "webmaster@pdqflyers.com";
        $subject = "Member Page Application for $fname $lname";
        $headers = "From: webmaster@pdqflyers.com";
        $result = mail($to, $subject, $message, $headers); 
        } 
    else 
        {
        echo "<br>Photo Privacy flag set off. The webmaster will be asked to add your photo to the Member Photo Page when it is available.";
        echo "<br>You could send him a photo or wait until it is convenient for him to take one of you.";
        
        /* send an email to the webmaster to ask that a headshot be included on the Member Photo Page */
        $message = "$fname $lname has requested that his photo be added to the Member Photo Page.";
        $message .= "\r\n\rCould you please do that for him?";
        $message .= "\r\n\rThank you.";
        $to      = "webmaster@pdqflyers.com";
        $subject = "Member Page Application for $fname $lname";
        $headers = "From: webmaster@pdqflyers.com";
        $result = mail($to, $subject, $message, $headers);
        }
    }

if ($g_general <> $new_g_general) {$changes_made = TRUE;
$sql = "UPDATE members SET g_general = '$new_g_general' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
if ($new_g_general) {echo "<br>General Interest Group flag set on";} ELSE {echo "<br>General Interest Group flag set off";}}
    
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

if ($g_scale <> $new_g_scale) {$changes_made = TRUE;
$sql = "UPDATE members SET g_scale = '$new_g_scale' WHERE maac = '$maac'";
$result = mysql_query($sql, $conn);
if ($new_g_scale) {echo "<br>Scale Interest Group flag set on";} ELSE {echo "<br>Scale Interest Group flag set off";}}

if ($changes_made) {echo "<br>The changes listed above have been made to your data.";} 
Else {echo "No changes have been made to your data.";}

/* set up the whole name of the person for later */

$name .= $fname; $name .= " "; $name .= $lname;

mysql_close();  // close the data base
?>

<!--
This section determines the type of membership desired, computes the fee, verifies obedience to the Rules, and invokes another page which sends an email to all involved.
-->

<br><br><h3>Membership Application (optional)</h3>

<p>If you would like to apply for or renew your Membership Card, follow the instructions below, otherwise, close this window.</>


<p>Please check the appropriate boxes and then click on the "Apply for Membership Card" button.  This will cause an email with your request and information to be sent to the Treasurer.  He will 
validate that your MAAC membership is active for this year and, after payment received, mail your new Membership Card to your home address.<br>
<p>If you are not yet ready to submit this membership, cancel this process by closing the window.
<br><br>

<form method="post" 
      action="app-submit.php">

    <fieldset id="application"> <legend><strong><?php echo "Membership Request for $fname $lname"; ?></strong></legend>

    <p><font color="red">Junior, Social, and Associate members do not have to pay an initiation fee.<br>
        For New Full Members only, a reduced annual fee is applied when joining part way into the first year.
        Please check your desired start date below.<br></font></p>

<input type="checkbox" name="apply_new" <label>  New Member</label> (Initiation fee is $50 for Full Members) 

<br><br>
Annual Membership:<br>
<input type = "radio" name="member_type" value = "full" <?php echo 'checked="checked"'; ?> <label>  Full Member</label> (Renewal fee is $100, but $75 if paid before Feb 1)
 &nbsp;==> New Member start date: &nbsp;
 <select name="start_date">
  <option value="beginning">January 1st - first year fee is $75</option>
  <option value="summer">July 1st - first year fee is $50</option>
  <option value="fall">September 1st - first year fee is $25</option>
</select>
<br>
<input type = "radio" name="member_type" value = "junior" <label>  Junior Member/label> (Fee is $0)&nbsp;&nbsp; 
<input type ="number" name ="junior_age" width ="2" value = "17" <label>  Junior Age</label><br>
<input type = "radio" name="member_type" value = "social" <label>  Social Member</label> (Fee is $30)<br>
<input type = "radio" name="member_type" value = "associate" <label>  Associate Member</label> (Fee is $50)<br><br>


<input type="checkbox" name="apply_key" <label>  Key Required</label> (Deposit is $5)<br>

<br>

<input type = "checkbox" name="apply_rules" 
<label>  Please indicate by checking this box that you have read the <a href="http://www.pdqflyers.com/pdq-rules.php"target="_new">PDQ Flyers Club Rules</a> 
and that you agree to follow them.</label><br>


</fieldset>
    
    <fieldset id="keys" class ="hide"> 


<label>MAAC: *</label> <br><input size="12"
                  name="submit_maac" value = "<?php echo htmlspecialchars($maac); ?>" /><br>
<label>Name: *</label> <br><input size="12"
                  name="submit_name" value = "<?php echo htmlspecialchars($name); ?>" /><br>
<label>First Name: *</label> <br><input size="12"
                  name="submit_fname" value = "<?php echo htmlspecialchars($fname); ?>" /><br>
<label>email: *</label> <br><input size="30"
                  name="submit_email" value = "<?php echo htmlspecialchars($email); ?>" /><br>
<label>Address: *</label> <br><input size="30"
                  name="submit_address" value = "<?php echo htmlspecialchars($address); ?>" /><br>
<label>City: *</label> <br><input size="30"
                  name="submit_city" value = "<?php echo htmlspecialchars($city); ?>" /><br>
<label>Postal Code: *</label> <br><input size="30"
                  name="submit_postal" value = "<?php echo htmlspecialchars($postal); ?>" /><br>
</fieldset>

<br>

    <button type="submit">
        <!--
<img src="procede.jpg" width="50" height="50" alt="Submit Request" />
        -->
 Apply for a Membership Card</button>
</form>


</body>

</html>