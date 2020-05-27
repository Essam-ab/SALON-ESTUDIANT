<?php
include "config.php";

if ($_POST['email']) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $result = $user->checkLogin($email);
    if ($result->rowCount()) {
        foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $val) {
            $hash = $val['use_password'];
            $username = $val['use_username'];
        }
        if (password_verify($password, $hash)) {
            echo "success verification";
            include "../session_handlers/sessionStarter.php";
            $_SESSION['username'] = $username;
            echo "<br>" . $_SESSION['username'] . "<br";
            $log = $user->userLoggedIn($_SESSION['username']);
            $_SESSION['userLoggedIn'] = true;
            header("location: ../../views/home.php");
            exit();
        } else {
            header("location: ../../index.php?error=invalid");
            echo "pass";
            exit();
        }
    } else {
        echo "mail";
        header("location: ../../index.php?error=invalid");
        exit();
    }
} else
    echo "cant find email in the post array!";
