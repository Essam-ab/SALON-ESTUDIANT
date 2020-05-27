<?php
include "./config.php";

$data = json_decode($_POST['data']);

$result = $stand->addStand($data->{'stand_name'}, $data->{'stand_desc'}, $data->{'image_location'}, $data->{'logo_location'});
if ($result->rowCount()) {
    echo "stand has been added!";
} else
    echo "oops! something went wrong, check out addStandFinalize.";
