<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Member Data Report Request Panel</title>
    
<style type="text/css">

#contact label {
    display: block;
    padding-left: 15px;
}
input {
border-style: outset; 
border-width: 3px;    
height: 25px;
    position: relative;
    top: -5px;
color:#800000;
}

</style>
    



  </head>
  <body>
<p><span style="FONT-SIZE: 20pt"><strong><font color="#0000ff">Member Data Report Request</font></strong></span></p>

<?php
// get the identification data that was passed to this program in the hidden form
$maac = $_REQUEST['request_maac'];
$lname = $_REQUEST['request_lname'];
$password = $_REQUEST['request_password'];

echo "$maac $lname $password";
?>

<p>To view Club Membership Database,enter your
MAAC number, last name, and password in the fields below and you will be re-directed to a page where Club data will be displayed.  You will be able to print a copy of the report if you need it.</p>
<p>Note that this is the only way to get to this page - if you bookmark it or refresh it, the page will come up but no data will appear.</p>

<div id="entries">

<form method="post" 
      action="data-detail-exec.php">
    

    <fieldset id="contact"> 
<legend>Access Information</legend>
        <label>MAAC#:   </label> <br><input size="12"
                  name="request_maac"><br>
        <label>Last Name:</label> <br><input size="30"
                  name="request_lname">
	<label>Password:</label> <br><input size="30"
                  name="request_password">
    </fieldset>

    <button type="submit">

<img src="procede.jpg" width="50" height="50" alt="Submit Request" background:red;/>
 Update My Data</button><br>
</form>
</div>

  </body>
</html>