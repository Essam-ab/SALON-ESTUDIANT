<?php
include "config.php";

if ($_POST['email']) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $result = $user->checkLogin($email);
    if ($result->rowCount()) {
        foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $val)
            $hash = $val['use_password'];
        if (password_verify($password, $hash)) {
            echo 1;
            include "../session_handlers/sessionStarter.php";
            $auth = $user->CheckUserAuthorized($email);
            if ($auth->rowCount())
                $_SESSION['auth'] = 'yes';
            else
                $_SESSION['auth'] = 'no';
            if (isset($_POST['username'])) {
                $_SESSION['username'] = $_POST['username'];
                $log = $user->userLoggedIn($_POST['username']);
                if (!$log->rowCount())
                    echo "error in logging you in!";
                else
                    $_SESSION['userLoggedIn'] = true;
            }
        } else
            echo 0;
    } else {
        echo "error in checkLogin!";
    }
}
