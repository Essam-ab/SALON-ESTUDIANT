<?php
include "config.php";

if (isset($_POST['username'])) {
    $username = $user->checkUsernameExist($_POST['username']);
    if ($username->rowCount())
        echo 1;
    else
        echo 0;
}
if (isset($_POST['email'])) {
    $email = $user->checkEmailExist($_POST['email']);
    if ($email->rowCount())
        echo 1;
    else
        echo 0;
}
