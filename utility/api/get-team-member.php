<?php

// EKİBİMİZ GENEL YAZISI
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'team-member'
                      ");
$query->execute();
$generalInfoTeamMember = $query->fetch();


// EKİP ÜYELERİ
$membersQuery = $vt->prepare("SELECT tm.*, tmt.title , tmt.description
                              FROM team_members tm
                              INNER JOIN team_members_translation tmt ON tm.member_id = tmt.member_id
                              WHERE tmt.language_code = '$selectedLang'
                              ORDER BY tm.member_sort ASC
                              ");
$membersQuery->execute();
$membersResult = $membersQuery->fetchAll(PDO::FETCH_OBJ);
