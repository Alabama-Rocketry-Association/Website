<?php
if (isset($_POST['submit'])) {

    $email_to = "avery8871@gmail.com";
    $email_subject = "New website submissions";
    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required
    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $headers = "From: " . clean_string($name) . " <" . clean_string($email) .">\r\n";
    $headers .= "Reply To: " . clean_string($email) . "\r\n";
    $headers .= "Content-type: text/html\r\n";
    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    mail($email_to, $email_subject, $email_message, $headers);
    header("Location: contact.html?mailsend");
?>