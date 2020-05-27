<?php
include "config.php";
include "../session_handlers/sessionStarter.php";

$result = $stand->getAllStandChiefs((int) $_POST['stand'], $_SESSION['username']);
if ($result->rowCount()) {
    $users = [];
    $i = 0;
    foreach ($result->fetchAll(PDO::FETCH_OBJ) as $val) {
        $users[$i]['user_logged'] = $val->user_logged;
        $users[$i]['username'] = $val->use_username;
        $i++;
    }
    echo json_encode($users);
} else
    echo "no online users!";
