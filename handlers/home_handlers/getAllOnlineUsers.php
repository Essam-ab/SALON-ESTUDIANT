<?php
include "config.php";
include "../session_handlers/sessionStarter.php";

if (isset($_POST['removeNoneSpokenWith'])) {
    $user_in_session = $user->getUserId($_SESSION['username']);

    if ($user_in_session->rowCount()) {
        foreach ($user_in_session->fetchAll(PDO::FETCH_OBJ) as $val)
            $user_in_session_id = $val->use_id;
    }
    $users = $user->getAllSpokenWithUsers($_SESSION['username'], (int) $user_in_session_id);
    if ($users->rowCount()) {
        $all_users = [];
        $i = 0;
        foreach ($users->fetchAll(PDO::FETCH_OBJ) as $val) {
            $all_users[$i]['user_logged'] = $val->user_logged;
            $all_users[$i]['username'] = $val->use_username;
            $i++;
        }
        echo json_encode($all_users);
    } else
        echo "no users online!";
} else if (isset($_POST['checkStandStatus'])) {
    $stand_id = $_POST['stand_id'];
    $users = $user->getAllOnlineOfflineUsers($_SESSION['username']);
    if ($users->rowCount()) {
        $all_users = [];
        $i = 0;
        foreach ($users->fetchAll(PDO::FETCH_OBJ) as $val) {
            $user_id = $user->getUserId($val->use_username);
            if ($user_id->rowCount())
                foreach ($user_id->fetchAll(PDO::FETCH_OBJ) as $x)
                    $user_id = $x->use_id;
            $check = $stand->getUserStatus($user_id, $stand_id, 'yes');
            if ($check->rowCount()) {
                $all_users[$i]['user_logged'] = $val->user_logged;
                $all_users[$i]['username'] = $val->use_username;
                $i++;
            }
        }
        echo json_encode($all_users);
    } else
        echo "no users online!";
} else if (isset($_POST['getOtherSpokenWith'])) {
    $user_in_session = $user->getUserId($_SESSION['username']);

    if ($user_in_session->rowCount()) {
        foreach ($user_in_session->fetchAll(PDO::FETCH_OBJ) as $val)
            $user_in_session_id = $val->use_id;
    }
    $users = $user->getAllSpokenWithChiefs($_SESSION['username'], (int) $user_in_session_id);
    if ($users->rowCount()) {
        $all_users = [];
        $i = 0;
        foreach ($users->fetchAll(PDO::FETCH_OBJ) as $val) {
            $all_users[$i]['user_logged'] = $val->user_logged;
            $all_users[$i]['username'] = $val->use_username;
            $i++;
        }
        echo json_encode($all_users);
    } else
        echo "no users online!";
} else {
    $users = $user->getAllOnlineOfflineUsers($_SESSION['username']);
    if ($users->rowCount()) {
        $all_users = [];
        $i = 0;
        foreach ($users->fetchAll(PDO::FETCH_OBJ) as $val) {
            $all_users[$i]['user_logged'] = $val->user_logged;
            $all_users[$i]['username'] = $val->use_username;
            $i++;
        }
        echo json_encode($all_users);
    } else
        echo "no users online!";
}
