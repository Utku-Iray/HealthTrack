<?php

$selectedTreatmentQuery = $vt->prepare("SELECT t.*, tt.name, tt.content, tt.url, tt.short_content
                              FROM treatments t
                              INNER JOIN treatments_translation tt ON t.treatment_id = tt.treatment_id
                              WHERE tt.language_code = '$selectedLang'
                              AND tt.url = '$treatmentURL'
                              ");
$selectedTreatmentQuery->execute();
$selectedTreatmentResult = $selectedTreatmentQuery->fetch();
