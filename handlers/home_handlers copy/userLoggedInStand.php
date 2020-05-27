<?php
include "config.php";

if (isset($_POST['username'])) {
    $user_id = $user->getUserId($_POST['username']);
    if ($user_id->rowCount()) {
        foreach ($user_id->fetchAll(PDO::FETCH_ASSOC) as $val)
            $user_id = $val['use_id'];
    }
    $check_user_status = $user->checkUserExistInStand($user_id, (int) $_POST['stand_id']);
    if (!$check_user_status->rowCount()) {
        $user_in_stand = $user->registerUserInStand($user_id, (int) $_POST['stand_id'], 'yes');
        if (!$user_in_stand->rowCount()) {
            echo 0;
        } else
            echo 1;
    } elseif ($check_user_status->rowCount()) {
        $user_in_stand = $user->logUserInStand($user_id, 'yes', (int) $_POST['stand_id']);
        if ($user_in_stand->rowCount()) {
            echo 1;
        } else
            echo "error";
    }
}
