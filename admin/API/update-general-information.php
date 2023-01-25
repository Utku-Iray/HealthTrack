<?php
include "../../database/connection.php";

$selectedLanguage = trim($_POST["langDataHolder"]);
$selectedID = trim(filter_input(INPUT_POST, 'idHolderInput'));

$generalInfoTitle = trim(filter_input(INPUT_POST, 'generalInfoTitle-' . $selectedLanguage));
$generalInfoDesc = $_POST['generalInfoDesc'];


if (
    empty($generalInfoTitle) ||   empty($generalInfoDesc)
) {
    $errors['error'] = 'Yıldızla işaretlenmiş bütün alanları doldurunuz.';
}


if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {
    $generalSelectQuery = $vt->prepare(
        "SELECT g.*, gt.title, gt.description, gt.general_id, gt.language_code
    FROM general g
    INNER JOIN general_translations gt ON g.general_id = gt.general_id
    WHERE g.general_id = '$selectedID'
    AND gt.language_code = '$selectedLanguage'
    "
    );
    $generalSelectQuery->execute();
    $generalSelectQueryResult = $generalSelectQuery->fetchAll(PDO::FETCH_OBJ);
    $generalSelectQueryResultCount = count($generalSelectQueryResult);

    if ($generalSelectQueryResultCount > 0) {
        # UPDATE
        $updateQuery = $vt->prepare("UPDATE general_translations 
                                     SET title = :title, 
                                         description = :description
                                     WHERE general_id = '$selectedID'
                                     AND   language_code = '$selectedLanguage'");
        if ($updateQuery) {
            $updateResult = $updateQuery->execute([
                ':title' => $generalInfoTitle,
                ':description' => $generalInfoDesc,
            ]);
            if ($updateResult) {
                $form_data['status'] = true;
                $form_data['success'] = 'Bilgi başarıyla güncellendi.';
            }
        }
    } else {
        # INSERT
        $generalInfoLanguageQuery = $vt->prepare('INSERT INTO general_translations (title, description, general_id, language_code)
         VALUES (:title, :description, :general_id, :language_code)');

        if ($generalInfoLanguageQuery) {
            $generalInfoLanguageQueryResult = $generalInfoLanguageQuery->execute([
                ':title' => $generalInfoTitle,
                ':description' => $generalInfoDesc,
                ':general_id' => $selectedID,
                ':language_code' => $selectedLanguage,
            ]);
            if ($generalInfoLanguageQueryResult) {
                $form_data['status'] = true;
                $form_data['success'] = 'Bilgi başarıyla güncellendi.';
            }
        }
    }
}

echo json_encode($form_data);

die();
$vt = null;
