<?php
include "./config.php";
$videotheque = new Videotheque();
if (isset($_GET['nom_vid'])) {
    $name = $_GET['nom_vid'];
    // $stand = $_GET['stand_id'];
    $stand = $_POST['stand_id'];
    $result = $videotheque->addVideotheque($name, 'none', (int) $stand);
    if (!$result->rowCount())
        echo "error trying to insert new videotheque!";
    else
        echo "all good in redirectvideotheque";
}
