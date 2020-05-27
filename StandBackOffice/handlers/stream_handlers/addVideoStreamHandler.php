<?php
include "./config.php";

$videotheque = new Videotheque();
if (isset($_POST['url'])) {
    $name = $_POST['name'];
    $url = $_POST['url'];
    $stand = $_POST['stand'];
    $result = $videotheque->addNewVideoStream($name, $url, $stand);
    if (!$result->rowCount())
        echo 0;
    else
        echo 1;
}
