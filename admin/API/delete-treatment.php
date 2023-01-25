<?php
include "../../database/connection.php";

$treatmentID = trim($_POST["treatmentID"]);


$query = $vt->prepare("SELECT * FROM treatments WHERE treatment_id='$treatmentID'");
$query->execute();
$treatmentResult = $query->fetchAll(PDO::FETCH_OBJ);


$treatmentImage = $treatmentResult[0]->treatment_main_img;

$deleteTreatmentLangQuery = $vt->prepare("DELETE FROM treatments_translation WHERE treatment_id ='$treatmentID'");
$deleteTreatmentLangResult = $deleteTreatmentLangQuery->execute();

if ($deleteTreatmentLangResult) {
    $deleteTreatmentQuery = $vt->prepare("DELETE FROM treatments WHERE treatment_id ='$treatmentID'");
    $deleteTreatmentResult = $deleteTreatmentQuery->execute();
    if ($deleteTreatmentResult) {
        $form_data['status'] = true;
        $form_data['message'] = 'Tedavi başarıyla silindi.';


        if (file_exists('../../' . $treatmentImage)) {
            unlink('../../' . $treatmentImage);
        }
    }
} else {
    $form_data['status'] = false;
    $form_data['message'] = 'Bir sorun yaşanıyor. Lütfen daha sonra tekrar deneyiniz.';
}
echo json_encode($form_data);
die();
$vt = null;
