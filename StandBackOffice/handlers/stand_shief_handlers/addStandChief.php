<?php
include "config.php";

if (isset($_POST['user'])) {
    $username = $_POST['user'];
    $stand_id = $_POST['stand'];

    $result = $stand->addNewStandChief($username, $stand_id);
    if ($result->rowCount()) {
        //updating user authority
        $result = $user->updateUserAuthority('yes', $username);
        if ($result->rowCount())
            echo 1;
        else
            echo -1;
    } else
        echo 0;
}
