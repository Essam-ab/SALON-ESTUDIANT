<?php

if (isset($_FILES) && !empty($_POST['video'])) {
    // if (isset($_POST['name'])) {
    $name = $_FILES['video']['name'];
    move_uploaded_file(['tmp_name'], '../assets/img/uploads/' . $_POST['name']);
    echo "success all good!";
    // echo json_encode(['status' => 200, 'message' => '../assets/img/uploads/' / $name]);
    // exit();
} else {
    echo "error couldnt capture any file";
}
