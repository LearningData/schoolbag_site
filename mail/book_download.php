<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['school'])	||
   empty($_POST['role'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
$name = $_POST['name'];
$email_address = $_POST['email'];
$school = $_POST['school'];
$role = $_POST['role'];
#$url = 'http://192.168.1.174:8181/schoolbag';

// Create the email and send the message
$to_1 = 'amanda@learningdata.ie'; // 'Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
// $to_1 = 'sidimar@learningdata.ie';


$headers_1 = "From: Schoolbag <support@schoolbag.ie>\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers_1 = "Reply-To: noreply@schoolbag.ie";

$email_subject_1 = "Download request for HW report";

$email_body = "$name, a $role at $school just requested access to the homework report. \n\n $name's email address is $email_address. \n\n -- \n\n This e-mail was sent from the download homework report form (http://schoolbag.ie)";

mail($to_1,$email_subject_1,$email_body,$headers_1);




// Create the email and send the message
$to_2 = "$email_address"; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject_2 = "Your copy of 'What Every Head Teacher Should Know About Homework' ";

$headers_2 = "From: Schoolbag <support@schoolbag.ie>\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers_2 .= "Reply-To: noreply@schoolbag.ie";
$headers_2 .= "MIME-Version: 1.0\r\n";
$headers_2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<table style="border-collapse: collapse; width: 640px; margin: 0 auto; background-color: #fff;" align="center" border="0" cellpadding="0" cellspacing="0">';
$message .= '<tr>';
$message .= '<td style="padding:0;" align="center"><img src="https://www.googledrive.com/host/0B9GcfIfEeTHyazZ5ODJBSzZmVGM" alt="image" style="width: 586px; height: auto; max-width: 586px; border: 0; display: block; -ms-interpolation-mode: bicubic;" height="240" width="586" /></td>';
$message .= '</tr>';
$message .= '<tr>';
$message .= '<td>';
$message .= "<h5 style='font-family: tahoma,geneva,sans-serif; color: #f38d0b; font-size: 24px; text-align: center; line-height: 24px; font-weight: bold; -webkit-font-smoothing: antialiased; margin: 0px 0px 8px; margin: 30px 0px 30px;'>Hi $name,</h5>";
$message .= '<p style="font-family: tahoma,geneva,sans-serif; color: #878a92; font-size: 14px; line-height: 22px; font-weight: 400; -webkit-font-smoothing: antialiased; margin: 0px 0px 8px !important; text-align: center;">Thanks for signing up to receive a free copy of <strong><em>What Every Head Teacher Should Know About Homework</em></strong>, your copy can be downloaded using the personalised link below.</p>';
$message .= '<p style="font-family: tahoma,geneva,sans-serif; text-align: center; color: #878a92; font-size: 14px; line-height: 22px; -webkit-font-smoothing: antialiased; margin: 30px 0px 8px !important;">Happy reading,<br /> <strong>The Schoolbag Team</strong></p>';
$message .= '</td>';
$message .= '</tr>';
$message .= '<tr>';
$message .= '<td style="text-align: center; height: 80px;"><a href="http://192.168.1.174:8181/schoolbag/books/What_Every_Head_Teacher_Should_Know_About_Homework.pdf" style="font-family: tahoma,geneva,sans-serif; font-size: 16px; line-height: 16px; padding: 15px 25px; text-align: center; background-color: #f38d0b; color: #fff; text-decoration: none; outline: none; border-radius: 5px;">Download Report</a></td>';
$message .= '</tr>';
$message .= '<tr>';
$message .= '<td style="font-family: tahoma, geneva, sans-serif; font-size: 18px; line-height: 24px; color: #3c3f48; font-weight: 400;" align="center">Know others who may like a copy?</td>';
$message .= '</tr>';
$message .= '<tr>';
$message .= '<td align="center" style="text-align: center; height: 100px;"><a href="www.facebook.com/sharer/sharer.php?u=www.learningdata.ie/what-every-teacher-should-know-about-homework-download" style="text-decoration: none; outline: none; -moz-border-radius: 100px; border-radius: 100px; background-color: #3c3f48; width: 50px; height: 50px; display: inline-block; margin: 30px 20px 0 auto;"><img src="https://www.googledrive.com/host/0B9GcfIfEeTHyaGJfU1Fzc1Jhc2c" style="border: 0; display: block; -ms-interpolation-mode: bicubic; max-width: 50px; max-height: 50px; "height="50" width="50" /></a><a style="text-decoration: none; outline: none; -moz-border-radius: 100px; border-radius: 100px; background-color: #3c3f48; width: 50px; height: 50px; display: inline-block; margin: 30px auto 0;" href="http://twitter.com/home?status=Six%20things%20every%20head%20teacher%20should%20know%20about%20%23homework%20:%20http://www.learningdata.ie/what-every-teacher-should-know-about-homework-download via @Schoolbag4HW"><img src="https://www.googledrive.com/host/0B9GcfIfEeTHyQmxEbHNXdFZRV1E" alt="twitter" title="twitter" style="border: 0; display: block; -ms-interpolation-mode: bicubic; max-width: 50px; max-height: 50px;" height="50" width="50"/></a></td>';
$message .= '</tr>';
$message .= '</table>';
mail($to_2,$email_subject_2,$message,$headers_2);
?>
