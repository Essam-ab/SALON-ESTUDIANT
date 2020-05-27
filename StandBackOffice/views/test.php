<?php
include "../classes/db.php";
include "../classes/videotheque.php";
$videotheque = new Videotheque();

if (isset($_POST['data'])) {
    if (isset($_GET['name']))
        $vid_name = $_GET['name'];
    echo "get:vidname=" . $vid_name;

    $vid_name = json_decode($_POST['data']);
    $vid_name = $vid_name->{'nom_vid'};

    // if (isset($_POST['upload_video'])) {
    $name = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];

    move_uploaded_file($tmp, "../videos/" . $name);

    // $vid_name = "<script>document.write(localStorage.getItem('vid_name'));</script>";
    // define('XOAUTH_USERNAME', $vid_name);

    $result = $videotheque->addVideotheque($vid_name, $name);
    if (!$result->rowCount())
        echo "error trying to insert new videotheque!";
    else
        echo "<h1>videotheque inserted successfully!</h1>";
    // }
}
