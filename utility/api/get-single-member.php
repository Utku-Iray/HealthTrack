<?php 

// EKİP ÜYELERİ
$membersQuery = $vt->prepare("SELECT tm.*, tmt.title , tmt.description
                              FROM team_members tm
                              INNER JOIN team_members_translation tmt ON tm.member_id = tmt.member_id
                              WHERE tmt.language_code = '$selectedLang'
                              AND tm.member_id = '$doc_id'
                              ORDER BY tm.member_sort ASC
                              ");
$membersQuery->execute();
$membersResult = $membersQuery->fetch();
