<?php

include "../../database/connection.php";

$click_count = $_POST['click_count'];
$tid = $_POST['tid'];

if ($click_count == "plus") {
    $sorgu = $vt->prepare("UPDATE treatments SET treatment_click_count = treatment_click_count + 1 WHERE treatment_id = '$tid'");
    $result = $sorgu->execute();
}
