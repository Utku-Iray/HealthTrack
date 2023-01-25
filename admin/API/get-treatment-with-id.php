<?php


$treatmentsQuery = $vt->prepare("SELECT t.*, tt.name, tt.short_content, tt.content, tt.url, tt.language_code 
                                FROM treatments t
                                INNER JOIN treatments_translation tt ON t.treatment_id = tt.treatment_id
                              WHERE t.treatment_id = '$treatmentID'
                              ");
$treatmentsQuery->execute();
$treatmentsResult = $treatmentsQuery->fetchAll(PDO::FETCH_OBJ);

$filteredTreatmentLangCodeArray = array();
foreach ($treatmentsResult as $singleTreatmentData) {
    array_push($filteredTreatmentLangCodeArray, $singleTreatmentData->language_code);
}
