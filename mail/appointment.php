<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['dayofweek'])     ||
   empty($_POST['timeofday'])     ||
   empty($_POST['reasonforappt'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "No arguments Provided!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$dayofweek = strip_tags(htmlspecialchars($_POST['dayofweek']));
$timeofday = strip_tags(htmlspecialchars($_POST['timeofday']));
$reasonforappt = strip_tags(htmlspecialchars($_POST['reasonforappt']));
   
// Create the email and send the message
$to = 'smileymolar@hotmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Appointment Form:  $name";
$email_body = "You have received a new message from your website appointment form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nPreferred Day of Week: $dayofweek\n\nPreferred Time of Day: $timeofday\n\nReason for Appointment: $reasonforappt";
$headers = "From: noreply@smileymolar.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>