<?php
include "config.php";
$nb = $stand->getNbStands();

if ($nb->rowCount())
    foreach ($nb->fetchAll(PDO::FETCH_ASSOC) as $val)
        echo $val['stand_nb'];
else
    echo 0;
