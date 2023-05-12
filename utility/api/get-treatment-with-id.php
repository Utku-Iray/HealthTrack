<?php
$urlQuery = $vt->prepare("SELECT tt.*
                          FROM treatments_translation tt
                          WHERE tt.url = '$treatmentURL'
                            ");
$urlQuery->execute();
$urlQueryResult = $urlQuery->fetch();

$tid = $urlQueryResult["treatment_id"];




$selectedTreatmentQuery = $vt->prepare("SELECT t.*, tt.name, tt.content, tt.url, tt.short_content
                              FROM treatments t
                              INNER JOIN treatments_translation tt ON t.treatment_id = tt.treatment_id
                              WHERE tt.language_code = '$selectedLang'
                              AND tt.treatment_id = '$tid'
                              ");
$selectedTreatmentQuery->execute();
$selectedTreatmentResult = $selectedTreatmentQuery->fetch();
