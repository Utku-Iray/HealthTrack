<?php

$generalInfoQuery = $vt->prepare("SELECT g.*, gt.title, gt.description, gt.language_code 
                              FROM general g
                              INNER JOIN general_translations gt ON g.general_id = gt.general_id
                              WHERE gt.general_id = '$urlGeneralID'
                              ");
$generalInfoQuery->execute();
$generalInfoQueryResult = $generalInfoQuery->fetchAll(PDO::FETCH_OBJ);

$filteredGeneralInfoLangCodeArray = array();
foreach ($generalInfoQueryResult as $singleInfoData) {
    array_push($filteredGeneralInfoLangCodeArray, $singleInfoData->language_code);
}
