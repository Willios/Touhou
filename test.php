<?php 

    if(isset($_POST['sendmail'])) {

    require_once 'vendor/autoload.php';

    // Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 578, 'ssl'))
    ->setUsername('your username')
    ->setPassword('your password')
    ;

    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = (new Swift_Message($_POST["email"]))
    ->setFrom([ EMAIL => 'John Doe'])
    ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
    ->setBody('Here is the message itself')
    ;

    // Send the message
    $result = $mailer->send($message);

    }