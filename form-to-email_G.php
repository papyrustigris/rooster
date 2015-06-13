<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$fullname = $_POST['full_name_G'];
$company = $_POST['company_G'];
$email = $_POST['email_G'];

//Validate first
if(empty($fullname)|| empty($company) || empty($email)) 
{
    echo "All fields are mandatory!";
    exit;
}

$email_to = $email;
$email_from = 'automatedtest@roostr.tv';//<== update the email address
$email_subject = "gamer";
$email_body = "You have received a new message from the user $fullname.\n Here is the message:\n $company \n".
    
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $company \r\n";
//Send the email!
mail($email_to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: games.html');


// Function to validate against any email injection attempts
// function IsInjected($str)
// {
//   $injections = array('(\n+)',
//               '(\r+)',
//               '(\t+)',
//               '(%0A+)',
//               '(%0D+)',
//               '(%08+)',
//               '(%09+)'
//               );
//   $inject = join('|', $injections);
//   $inject = "/$inject/i";
//   if(preg_match($inject,$str))
//     {
//     return true;
//   }
//   else
//     {
//     return false;
//   }
// }
   
// if(IsInjected($email_to))
// {
//     echo "Bad email value!";
//     exit;
// }

?> 