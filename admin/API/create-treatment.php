<?php
include "../../database/connection.php";

$defaultLanguage = trim(filter_input(INPUT_POST, 'defaultLanguage'));

$treatmentName = trim(filter_input(INPUT_POST, 'treatmentName'));
$treatmentShortDescription = trim(filter_input(INPUT_POST, 'treatmentShortDescription'));
$treatmentDescription = $_POST['treatmentDescription'];
$image = "treatmentImage";


$tmpFilePath = $_FILES[$image]['tmp_name'];
$filename = $_FILES[$image]["name"];
$efilename = explode('.', $filename);
$uzanti = $efilename[count($efilename) - 1];
$location  = "";

$treatmentNameLower = strtolower($treatmentName);
$url = str_replace(" ", "-", $treatmentNameLower);

if (
    empty($treatmentName) ||   empty($treatmentDescription) || empty($treatmentShortDescription) ||  empty($filename)
) {
    $errors['error'] = 'Yıldızla işaretlenmiş bütün alanları doldurunuz.';
}

if ($uzanti != 'png' && $uzanti != 'jpg' && $uzanti != 'jpeg') {
    $errors['error'] = 'Seçilen fotoğraf türü JPG veya PNG olmalıdır.';
}

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {

    $nameWithURL = $url . "." . $uzanti;
    if ($tmpFilePath != "") {
        $location  = "attachments/treatments/" . $nameWithURL;
        if (file_exists('../../attachments/treatments/' . $nameWithURL)) {
            unlink('../../attachments/treatments/' . $nameWithURL);
        }
        move_uploaded_file($_FILES[$image]['tmp_name'], "../../attachments/treatments/" . $nameWithURL);
    }

    $treatmentInsertQuery = $vt->prepare('INSERT INTO treatments (treatment_main_img, treatment_click_count, treatment_sort)
    VALUES (:treatment_main_img, :treatment_click_count, :treatment_sort)');
    if ($treatmentInsertQuery) {
        $treatmentInsertQueryResult = $treatmentInsertQuery->execute([
            ':treatment_main_img' => $location,
            ':treatment_click_count' => "0",
            ':treatment_sort' => "0",
        ]);
        if ($treatmentInsertQueryResult) {
            $treatmentInsertQueryID = $vt->lastInsertId();
            $treatmentLanguageQuery = $vt->prepare('INSERT INTO treatments_translation (name, short_content, content, url, treatment_id, language_code)
            VALUES (:name, :short_content, :content, :url, :treatment_id, :language_code)');
            if ($treatmentLanguageQuery) {
                $treatmentLanguageQueryResult = $treatmentLanguageQuery->execute([
                    ':name' => $treatmentName,
                    ':short_content' => $treatmentShortDescription,
                    ':content' => $treatmentDescription,
                    ':url' => $url,
                    ':treatment_id' => $treatmentInsertQueryID,
                    ':language_code' => $defaultLanguage,
                ]);
                if ($treatmentLanguageQueryResult) {
                    $form_data['status'] = true;
                    $form_data['success'] = 'Yeni tedavi başarıyla eklendi.';
                }
            }
        }
    }
}

echo json_encode($form_data);

die();
$vt = null;
