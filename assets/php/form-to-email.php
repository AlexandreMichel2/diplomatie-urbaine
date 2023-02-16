<?php
if(!isset($_POST['submit']))
{
	echo "error; you need to submit the form!";
}
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if(empty($visitor_email)) 
{
    echo "Email adress is mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = "$visitor_email";
$email_subject = "$subject";
$email_body = "Vous avez reçu un nouveau message en provenance de $visitor_email.\n".
                            "Voici le contenu du message:\n $message".
    
$to = "Alexandre.Michel@USherbrooke.ca, alex-michel@live.fr";
$headers = "From: $email_from \r\n";

mail($to,$email_subject,$email_body,$headers);
header('Location: thank-you.html');

function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 