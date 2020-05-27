<?php

$filename = $_FILES['file']['name'];

if ($_GET['type'] == "image")
    $location = 'StandBackOffice/assets/img/uploads/' . $filename;
else
    $location = 'StandBackOffice/assets/logos/uploads/' . $filename;

$isOk = 1;
$imageFileType = pathinfo('../assets/logos/uploads/' . $filename, PATHINFO_EXTENSION);

$valid_extensions = array('jpg', 'jpeg', 'png');
if (!in_array(strtolower($imageFileType), $valid_extensions)) {
    $isOk = 0;
}

if ($isOk == 0) {
    echo $isOk;
} else {
    if ($_GET['type'] == "image")
        if (move_uploaded_file($_FILES['file']['tmp_name'], '../assets/img/uploads/' . $filename)) {
            echo $location;
        } else
            echo "error trying to move uploaded file to its location!";
    else
    if (move_uploaded_file($_FILES['file']['tmp_name'], '../assets/logos/uploads/' . $filename)) {
        echo $location;
    } else
        echo "error trying to move uploaded file to its location!";
}
