<?php

if($_POST["message"]) {

    $visitor_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    mail("Alexandre.Michel@USherbrooke.ca", "$subject", "$message", "From: $visitor_email");
}

?>