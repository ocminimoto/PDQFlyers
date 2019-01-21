<!DOCTYPE html>
<html lang="en">
  <head>
<!--
under development
-->

    <meta charset="utf-8">
    <title>Membership Application Request</title>

<!--
need the PDQ Flyers logo at the top
-->

<img src="http://www.pdqflyers.com/PDQ-banner.jpg"/>


<style type = "text/CSS";>
.hide {display:none;}
</style>

</head>
<body>

<?php

/*
First step is to retrieve all of the Member's data fields that were collected in data-updater.php
*/

$maac = $_REQUEST['apply_maac'];
$lname = $_REQUEST['apply_lname'];

$fname = $_REQUEST['apply_fname'];
$email = $_REQUEST['apply_email'];
$address = $_REQUEST['apply_address'];
$city = $_REQUEST['apply_city'];
$postal = $_REQUEST['apply_postal'];
$name .= $fname; $name .= " "; $name .= $lname;


?>

<!--
This page will be integrated into data-write.php.  
It determines the type of membership desire, computes the fee, verifies obedience to the Rules, and invokes another page which sends an email to all involved.
-->

<p><span style="FONT-SIZE: 24pt"><strong><font color="#0000ff">Membership Application Request</font></strong></span></p>

<h3>Membership Application Form</h3>
Please check the appropriate boxes below and then click on the Apply for Membership button.  This will cause an email with your request and information to be sent to the Treasurer.  He will 
validate that your MAAC membership is active for this year and, after payment received, mail your new Membership Card to your home address.<br>
<p>If you are not yet ready to submit this membership, cancel this process by closing the window.
<br><br>

<form method="post" 
      action="app-submit.php">

<fieldset id="keys" class ="hide"> 


<label>MAAC: *</label> <br><input size="12"
                  name="submit_maac" value = "<?php echo htmlspecialchars($maac); ?>" /><br>
<label>Name: *</label> <br><input size="12"
                  name="submit_name" value = "<?php echo htmlspecialchars($name); ?>" /><br>
<label>email: *</label> <br><input size="30"
                  name="submit_email" value = "<?php echo htmlspecialchars($email); ?>" /><br>
<label>Address: *</label> <br><input size="30"
                  name="submit_address" value = "<?php echo htmlspecialchars($address); ?>" /><br>
<label>City: *</label> <br><input size="30"
                  name="submit_city" value = "<?php echo htmlspecialchars($city); ?>" /><br>
<label>Postal Code: *</label> <br><input size="30"
                  name="submit_postal" value = "<?php echo htmlspecialchars($postal); ?>" /><br>
</fieldset>

    
<fieldset id="application"> <legend><?php echo "Membership Request for $fname $lname"; ?></legend>


<input type="checkbox" name="apply_new" <label>  New Member</label> (Initiation fee is $50)<br><br>

<input type = "radio" name="member_type" value = "full" <?php echo 'checked="checked"'; ?> <label>  Full Member</label> (Annual fee is $75)<br>
<input type = "radio" name="member_type" value = "junior" <label>  Junior Member</label> (Annual fee is $25) <br>
<input type = "radio" name="member_type" value = "social" <label>  Social Member</label> (Annual fee is $50)<br>
<input type = "radio" name="member_type" value = "associate" <label>  Associate Member</label> (Annual fee is $50)<br><br>

<input type="checkbox" name="apply_key" <label>  Key Required</label> (Deposit is $5)<br>

<br>

<input type = "checkbox" name="apply_rules" 
<label>  Please indicate by checking this box that you have read the <a href="http://www.pdqflyers.com/pdq-rules.php"target="_new">PDQ Flyers Club Rules</a> 
and that you agree to follow them.</label><br>


</fieldset>

<br>

    <button type="submit">
<img src="procede.jpg" width="50" height="50" alt="Submit Request" />
 Apply for a Membership Card</button>
</form>



</body>
