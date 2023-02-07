<?php
include "../../database/connection.php";

$sliderID = trim($_POST["sliderID"]);


$query = $vt->prepare("SELECT * FROM slider WHERE slider_id='$sliderID'");
$query->execute();
$sliderResult = $query->fetchAll(PDO::FETCH_OBJ);


$sliderImage = $sliderResult[0]->slider_image;

$deleteSliderLangQuery = $vt->prepare("DELETE FROM slider_translations WHERE slider_id ='$sliderID'");
$deleteSliderLangResult = $deleteSliderLangQuery->execute();

if ($deleteSliderLangResult) {
    $deleteSliderQuery = $vt->prepare("DELETE FROM slider WHERE slider_id ='$sliderID'");
    $deleteSliderResult = $deleteSliderQuery->execute();
    if ($deleteSliderResult) {
        $form_data['status'] = true;
        $form_data['message'] = 'Slider başarıyla silindi.';


        if (file_exists('../../' . $sliderImage)) {
            unlink('../../' . $sliderImage);
        }
    }
} else {
    $form_data['status'] = false;
    $form_data['message'] = 'Bir sorun yaşanıyor. Lütfen daha sonra tekrar deneyiniz.';
}
echo json_encode($form_data);
die();
$vt = null;
