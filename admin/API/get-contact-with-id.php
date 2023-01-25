<?php


$query = $vt->prepare("SELECT * FROM contact WHERE contact_id='$urlContactID'");
$query->execute();
$contactQueryIDResult = $query->fetchAll(PDO::FETCH_OBJ);
