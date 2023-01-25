<?php


$generalInfoQuery = $vt->prepare("SELECT g.*, gt.title, gt.description
                                  FROM general g
                                  INNER JOIN general_translations gt ON g.general_id = gt.general_id
                                  WHERE gt.language_code = 'tr'");
$generalInfoQuery->execute();
$generalInfoQueryResult = $generalInfoQuery->fetchAll(PDO::FETCH_OBJ);
