<?php
include "config.php";
include "../session_handlers/sessionStarter.php";

$result = $user->getUserMail($_SESSION['username']);
if ($result->rowCount())
    foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $val)
        $from = $val['use_email'];
echo $from;
$to = $_POST['receiver_mail'];
$subject = 'Stand_request';
$message = $_POST['message'];
$headers = "From:" . $from;
$headers .= "mailed-by: " . $from;

mail($to, $subject, $message, $headers);
