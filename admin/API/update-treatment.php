<?php
include "../../database/connection.php";

$selectedLanguage = trim($_POST["langDataHolder"]);
$selectedID = trim(filter_input(INPUT_POST, 'idHolderInput'));

$treatmentName = trim(filter_input(INPUT_POST, 'treatmentName-' . $selectedLanguage));
$treatmentShortDescription = trim(filter_input(INPUT_POST, 'treatmentShortDescription-' . $selectedLanguage));
$treatmentDescription = $_POST['treatmentDescription'];
$image = "treatmentImage-" . $selectedLanguage;


// $tmpFilePath = $_FILES[$image]['tmp_name'];
// $filename = $_FILES[$image]["name"];
// $efilename = explode('.', $filename);
// $uzanti = $efilename[count($efilename) - 1];
// $location  = "";

$treatmentNameLower = strtolower($treatmentName);
$url = str_replace(" ", "-", $treatmentNameLower);

// ||  empty($filename)
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

    if ($treatmentSelectQueryResultCount > 0) {
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
