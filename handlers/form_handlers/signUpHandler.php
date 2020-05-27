<?php
include "config.php";

if ($_POST['username']) {
    $f_name = filter_input(INPUT_POST, 'f_name', FILTER_SANITIZE_STRING);
    $l_name = filter_input(INPUT_POST, 'l_name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $region = $_POST['region'];
    $niveau = filter_input(INPUT_POST, 'niveau', FILTER_SANITIZE_STRING);
    $phone = (int) $_POST['phone_number'];
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $result = $user->addUser($f_name, $l_name, $username, $email, $hash, $niveau, $region, $phone);
    if ($result->rowCount())
        echo 1;
    else
        echo 0;
}
