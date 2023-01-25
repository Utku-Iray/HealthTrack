<?php


$query = $vt->prepare("SELECT * FROM contact");
$query->execute();
$contactQueryResult = $query->fetchAll(PDO::FETCH_OBJ);
