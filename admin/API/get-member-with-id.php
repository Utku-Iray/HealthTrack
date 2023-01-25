<?php

$membersQuery = $vt->prepare("SELECT tm.*, tmt.title, tmt.description, tmt.language_code 
                              FROM team_members tm
                              INNER JOIN team_members_translation tmt ON tm.member_id = tmt.member_id
                              WHERE tm.member_id = '$urlMemberID'
                              ");
$membersQuery->execute();
$membersResult = $membersQuery->fetchAll(PDO::FETCH_OBJ);

$filteredMemberLangCodeArray = array();
foreach ($membersResult as $singleMemberData) {
    array_push($filteredMemberLangCodeArray, $singleMemberData->language_code);
}
