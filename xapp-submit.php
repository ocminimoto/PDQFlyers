<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <title>Membership Request Processing</title>

<img src="http://www.pdqflyers.com/PDQ-banner.jpg"/>
<style type = "text/CSS";>
.hide {display:none;}
</style>

  </head>
  <body>
<!--
This page is invoked by data-write.php.  It has two functions: check to see that the Rules requirement has been checked and send an email to the Treasurer.
-->

<p><span style="FONT-SIZE: 24pt"><strong><font color="#0000ff">Membership Request Report</font></strong></span></p>

<?php

/*
First step is to retrieve all of the Member's data fields that were collected in data-updater.php
Also, later on the current member year will be needed and this has to be set every January.

Change $currentyear to the cut off date for late payment, which is Feb 1 and later
Change $membershipyear to the new membership year
*/

$currentyear = '20180131';
$todaysdate = date('Ymd');
$membershipyear = '2018';

$maac = $_REQUEST['submit_maac'];
$name = $_REQUEST['submit_name'];
$fname = $_REQUEST['submit_fname'];
$sdate = $_REQUEST['start_date'];
$email = $_REQUEST['submit_email'];
$address = $_REQUEST['submit_address'];
$city = $_REQUEST['submit_city'];
$postal = $_REQUEST['submit_postal'];

$new_member = $_REQUEST['apply_new'];
$member_type = $_REQUEST['member_type'];
$junior_age = $_REQUEST['junior_age'];
$apply_key = $_REQUEST['apply_key'];
$apply_rules = $_REQUEST['apply_rules'];

/*
Next job is to make sure that required fields are present and, if not, abort
*/

if (! $apply_rules) {die ("Rules agreement is required field, please use your browser's back arrow key to agree to the Club's Rules.");}

/*
Find out the total amount of the fee
New, full member is a little complicated as they don't have to join for the full first year
*/

if ($new_member) 
    {
    if ($member_type == "full") 
        {
        if ($sdate == "fall") {$total += 25;} elseif ($sdate == "summer"){$total += 50;} else {$total += 75;}
        $total += 50;
        }
    else 
        {
        if ($sdate <> "beginning")  //it's not a full member, but they might be expecting a pro-rated fee
            {
            die ("Pro-rated fees are not applicable. Please use your browser's back arrow key to correct this input.");
            }
        }
    }
else 
    {
    if ($sdate <> "beginning") 
        {
        die ("Pro-rated fees are not applicable. Please use your browser's back arrow key to correct this input.");
        }
    if ($member_type == "full") 
        {
        /* 
        Need to check to see if it's a late payment or not; ie, is it greater than Jan 31st of the payment year?
        */
        if ($currentyear < $todaysdate) 
            {
            $total += 100;
            }
        else
            {
            $total += 75;
            }
        }
    }

if ($member_type == "junior") {$total += 25;}
if ($member_type == "social") {$total += 30;}
if ($member_type == "associate") {$total += 50;}
if ($apply_key) {$total += 5;}

/* construct the email to the Treasurer */
$message = "Mr. Treasurer,\r\n\r$name (MAAC# $maac) has applied for a Membership card as";
if ($member_type == "full") {$message .= " a Full";}
if ($member_type == "junior") {$message .= " a Junior";}
if ($member_type == "social") {$message .= " a Social";}
if ($member_type == "associate") {$message .= " an Associate";}
if ($new_member) {$message .= ", new";}
$message .= " member for $membershipyear.";
if ($new_member) {if ($member_type == "full") {
    $message .= "\r\n\rThe start date requested is ";
    if ($sdate == "fall") {$message .= "September 1st.";}
    if ($sdate == "summer") {$message .= "July 1st.";}
    if ($sdate == "beginning") {$message .= "January 1st.";}}}

if ($member_type == "junior") {$message .= "\r\n\r$fname reported his age as $junior_age.  Please validate a Guardian's approval prior to issuing a Membership Card.";}
$message .= "\r\n\rCould you please validate MAAC membership and, when payment is received, adjust the Membership Type and Year in the database, and mail a Membership card to:\r\n";


$message .= " $address\r\n $city\r\n $postal";

if ($apply_key) {$message .= "\r\n\rPlease include a key to the field.";}

$message .= "\r\n\rThe total fee to be paid is: $$total";

$message .= "\r\n\rTo access the Member's Section on the PDQ Flyers website, use the password chipmunk.";

$message .= "\r\n\rThank you.";

$to      = "treasurer@pdqflyers.com";
$subject = "Membership Application for $name";

$headers = "From: webmaster@pdqflyers.com" . "\r\n" . "Cc: $email";

$result = mail($to, $subject, $message, $headers);


if ($result) {echo "Your submission was successful. An email has been sent to the Treasurer with a copy to you.<br><br>";} 
	else {die ("Mail delivery failed.  Please use your browser back arrow and review your input.  If you do not see an error please send an email to the webmaster.");}

?>
<!-- tell the applicant the amount and let them pay with PayPal if they want -->

<p align="left"><b><span style="FONT-SIZE: 14pt">The total fee owing is $<?php echo "$total";?>.</span></b></p>

<p align="left">To pay online, select the correct box (based on description or amount) from the drop down list below and then click on the PayPal button. This will take you to the PayPal services secure
website where you can complete your payment.</p>

<p align="left">If you want to pay with a credit card you will be asked for information to
complete the transaction, but you will not need to log in.  To use your personal PayPal account, you will need
your PayPal userid and password.  In either case, the amount will be automatically deposited to the PDQ Flyers account.<br><br></p>



<!-- 
The following code is supplied by PayPal Services.  To get it, you sign on to the delivery PayPal account and set up a button.
This process results in PayPal generating code which you can embed here.

The section within these comment bookends is the code we used all of 2015.  Following is the new code for 2016.  When it has shown to be working, delete the 2015 code.

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="7CDBDJJZHC9PS">
<table>
<tr><td><input type="hidden" name="on0" value="Membership Fee">Membership Fee</td></tr><tr><td><select name="os0">
	<option value="Renew Full Member (Early pay)">Renew Full Member (Early pay) $75.00 CAD</option>
	<option value="Renew Full Member (after Jan 31st)">Renew Full Member (after Jan 31st) $100.00 CAD</option>
	<option value="New or Renew Junior">New or Renew Junior $25.00 CAD</option>
	<option value="New Full Member with initiation and key">New Full Member with initiation and key $130.00 CAD</option>
	<option value="New Full Member after July 1 with initiation">New Full Member after July 1 with initiation $105.00 CAD</option>
	<option value="NewFull Member after Sept 1st with initiation and key">NewFull Member after Sept 1st with initiation and key $80.00 CAD</option>
	<option value="New or renew Social Member">New or renew Social Member $30.00 CAD</option>
	<option value="New or renew Associate Member (astronomers etc)">New or renew Associate Member (astronomers etc) $50.00 CAD</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="CAD">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

-->

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="7CDBDJJZHC9PS">
<table>
<tr><td><input type="hidden" name="on0" value="Membership Fee">Membership Fee</td></tr><tr><td><select name="os0">
	<option value="Renew Full Member (Early pay)">Renew Full Member (Early pay) $75.00 CAD</option>
	<option value="Renew Full Member (after Jan 31st)">Renew Full Member (after Jan 31st) $100.00 CAD</option>
	<option value="New or Renew Junior">New or Renew Junior $25.00 CAD</option>
	<option value="New Full Member with initiation and key">New Full Member with initiation and key $130.00 CAD</option>
	<option value="New Full Member after July 1 with initiation">New Full Member after July 1 with initiation $105.00 CAD</option>
	<option value="NewFull Member after Sept 1st with initiation and key">NewFull Member after Sept 1st with initiation and key $80.00 CAD</option>
	<option value="New or renew Social Member">New or renew Social Member $30.00 CAD</option>
	<option value="New or renew Associate Member (astronomers etc)">New or renew Associate Member (astronomers etc) $50.00 CAD</option>
</select> </td></tr>
</table>
<input type="hidden" name="currency_code" value="CAD">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>



<!-- alternatively, the applicant can pay by check -->

<br><p> <align="left">If you prefer to pay your fee by check, please mail it to the Club Treasurer
at:</p>

<blockquote style="MARGIN-RIGHT: 0px"
            dir="ltr">
    <address>
        <span style="FONT-SIZE: 12pt"><span style="FONT-SIZE: 12pt">1880 Ashling Road</span></span>&nbsp;
    </address>

    <address>
        <span style="FONT-SIZE: 12pt">Qualicum Beach, BC</span>&nbsp;
    </address>

    <address>
        <span style="FONT-SIZE: 12pt"><span>V9K2V1</span></span>&nbsp;
    </address>
</blockquote>

</body>
</html>