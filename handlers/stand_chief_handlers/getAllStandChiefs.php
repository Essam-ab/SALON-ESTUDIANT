<?php
include "config.php";
include "../session_handlers/sessionStarter.php";

if (isset($_POST['stand'])) {
    $c = $stand->getAllStandChiefs($_POST['stand'], $_SESSION['username']);
    if ($c->rowCount()) {
        $data = [];
        $i = 0;
        foreach ($c->fetchAll(PDO::FETCH_OBJ) as $val) {
            $data[$i]['username'] = $val->use_username;
            $data[$i]['email'] = $val->use_email;
            $data[$i]['logged'] = $val->user_logged;
            $i++;
        }
        echo json_encode($data);
    } else
        echo 0;
}
