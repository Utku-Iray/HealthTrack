<?php

include "../../database/connection.php";

$click_count = $_POST['click_count'];
$nid = $_POST['nid'];

if ($click_count == "plus") {
    $sorgu = $vt->prepare("UPDATE news SET news_click_count = news_click_count + 1 WHERE news_id = '$nid'");
    $result = $sorgu->execute();
}
