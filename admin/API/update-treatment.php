<?php
include "../../database/connection.php";

$selectedLanguage = trim($_POST["langDataHolder"]);
$selectedID = trim(filter_input(INPUT_POST, 'idHolderInput'));

$treatmentName = trim(filter_input(INPUT_POST, 'treatmentName-' . $selectedLanguage));
$treatmentShortDescription = trim(filter_input(INPUT_POST, 'treatmentShortDescription-' . $selectedLanguage));
$treatmentDescription = $_POST['treatmentDescription'];
$image = "treatmentImage";


$tmpFilePath = $_FILES[$image]['tmp_name'];
if (!empty($tmpFilePath)) {
    $filename = $_FILES[$image]["name"];
    $efilename = explode('.', $filename);
    $uzanti = $efilename[count($efilename) - 1];
    if ($uzanti != 'png' && $uzanti != 'jpg' && $uzanti != 'jpeg') {
        $errors['error'] = 'Fotoğraf türü JPG veya PNG olmalıdır.';
    }
}



$url = replace_tr($treatmentName);




if (
    empty($treatmentName) ||   empty($treatmentDescription) || empty($treatmentShortDescription)
) {
    $errors['error'] = 'Yıldızla işaretlenmiş bütün alanları doldurunuz.';
}

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {
    $treatmentSelectQuery = $vt->prepare("SELECT t.*, tt.name, tt.short_content, tt.content, tt.url, tt.language_code 
                                    FROM treatments t
                                    INNER JOIN treatments_translation tt ON t.treatment_id = tt.treatment_id
                                    WHERE t.treatment_id = '$selectedID'
                                    AND tt.language_code = '$selectedLanguage'
    ");
    $treatmentSelectQuery->execute();
    $treatmentSelectQueryResult = $treatmentSelectQuery->fetchAll(PDO::FETCH_OBJ);
    $treatmentSelectQueryResultCount = count($treatmentSelectQueryResult);

    $treatmentImageVal = $treatmentSelectQueryResult[0]->treatment_main_img;

    if ($treatmentSelectQueryResultCount > 0) {

        if (!empty($tmpFilePath)) {
            $removePathArray = array("attachments/", ".jpg", ".png", "treatments/");
            $imageReplacedValue = str_replace($removePathArray, "", $treatmentImageVal);
            if (file_exists('../../' . $treatmentImageVal)) {
                unlink('../../' . $treatmentImageVal);
            }
            if ($imageReplacedValue == $url) {
                move_uploaded_file($_FILES[$image]['tmp_name'], "../../" . $treatmentImageVal);
            } else if ($imageReplacedValue != $url) {
                $newLocation = "attachments/treatments/" . $url . "." . $uzanti;
                move_uploaded_file($_FILES[$image]['tmp_name'], "../../" . $newLocation);

                $updateImagePathQuery = $vt->prepare("UPDATE treatments SET treatment_main_img = '$newLocation' WHERE treatment_id = '$selectedID'");
                $updateImagePathQuery->execute();
            }
        }

        # UPDATE
        $updateQuery = $vt->prepare("UPDATE treatments_translation 
                                     SET name = :name, 
                                         short_content = :short_content,
                                         content = :content,
                                         url = :url
                                     WHERE treatment_id = '$selectedID'
                                     AND   language_code = '$selectedLanguage'");
        if ($updateQuery) {
            $updateResult = $updateQuery->execute([
                ':name' => $treatmentName,
                ':short_content' => $treatmentShortDescription,
                ':content' => $treatmentDescription,
                ':url' => $url,
            ]);




            if ($updateResult) {
                $form_data['status'] = true;
                $form_data['success'] = 'Tedavi başarıyla güncellendi.';
            }
        }
    } else {
        # INSERT
        $teamLanguageQuery = $vt->prepare('INSERT INTO treatments_translation (name, short_content, content, url, treatment_id, language_code)
        VALUES (:name, :short_content, :content, :url, :treatment_id, :language_code)');

        if ($teamLanguageQuery) {
            $teamLanguageQueryResult = $teamLanguageQuery->execute([
                ':name' => $treatmentName,
                ':short_content' => $treatmentShortDescription,
                ':content' => $treatmentDescription,
                ':url' => $url,
                ':treatment_id' => $selectedID,
                ':language_code' => $selectedLanguage,
            ]);
            if ($teamLanguageQueryResult) {
                $form_data['status'] = true;
                $form_data['success'] = 'Tedavi başarıyla güncellendi.';
            }
        }
    }
}
echo json_encode($form_data);

die();
$vt = null;


function replace_tr($text)
{
    $stext = trim(strtolower($text));


    $marks = array("(", ")", "?", ",", ":", "/", "+");
    $search = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ' ');
    $replace = array('c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', '-');



    $new_text = str_replace($search, $replace, $stext);

    $new_text2 = str_replace($marks, "", $new_text);
    return $new_text2;
}
