<?php

$membersQuery = $vt->prepare("SELECT tm.*, tmt.title 
                              FROM team_members tm
                              INNER JOIN team_members_translation tmt ON tm.member_id = tmt.member_id
                              WHERE tmt.language_code = 'tr'
                              ");
$membersQuery->execute();
$membersResult = $membersQuery->fetchAll(PDO::FETCH_OBJ);
