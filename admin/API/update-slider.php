<?php
include "../../database/connection.php";


$selectedLanguage = trim($_POST["langDataHolder"]);
$selectedID = trim(filter_input(INPUT_POST, 'idHolderInput'));


$sliderTitle = trim(filter_input(INPUT_POST, 'sliderTitle-' . $selectedLanguage));
$sliderShortContent = trim(filter_input(INPUT_POST, 'sliderShortContent-' . $selectedLanguage));
$sliderLink = trim(filter_input(INPUT_POST, 'sliderLink-' . $selectedLanguage));

$url = replace_tr($sliderTitle);

if (
    empty($sliderTitle) ||   empty($sliderShortContent) ||   empty($sliderLink)
) {
    $errors['error'] = 'Yıldızla işaretlenmiş bütün alanları doldurunuz.';
}

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {
    $sliderSelectQuery = $vt->prepare("SELECT s.*, st.title, st.content, st.language_code
    FROM slider s
    INNER JOIN slider_translations st ON s.slider_id = st.slider_id
    WHERE s.slider_id = '$selectedID'
    AND st.language_code = '$selectedLanguage'
    ");
    $sliderSelectQuery->execute();
    $sliderSelectQueryResult = $sliderSelectQuery->fetchAll(PDO::FETCH_OBJ);
    $sliderSelectQueryResultCount = count($sliderSelectQueryResult);

    if ($sliderSelectQueryResultCount > 0) {
        # Single Update
        if ($sliderLink != $sliderSelectQueryResult[0]->slider_link) {
            $updateQuery1 = $vt->prepare("UPDATE slider SET slider_link = :slider_link WHERE slider_id = '$selectedID'");
            $updateQuery1->execute([':slider_link' => $sliderLink]);
        }
        # UPDATE
        $updateQuery = $vt->prepare("UPDATE slider_translations 
                                     SET title = :title, 
                                         content = :content
                                     WHERE slider_id = '$selectedID'
                                     AND   language_code = '$selectedLanguage'");
        if ($updateQuery) {
            $updateResult = $updateQuery->execute([
                ':title' => $sliderTitle,
                ':content' => $sliderShortContent,
            ]);
            if ($updateResult) {
                $form_data['status'] = true;
                $form_data['success'] = 'Slider başarıyla güncellendi.';
            }
        }
    } else {
        # INSERT
        $sliderLanguageQuery = $vt->prepare('INSERT INTO slider_translations (title, content, slider_id, language_code)
         VALUES (:title, :content, :slider_id, :language_code)');

        if ($sliderLanguageQuery) {
            $sliderLanguageQueryResult = $sliderLanguageQuery->execute([
                ':title' => $sliderTitle,
                ':content' => $sliderShortContent,
                ':slider_id' => $selectedID,
                ':language_code' => $selectedLanguage,
            ]);
            if ($sliderLanguageQueryResult) {
                $form_data['status'] = true;
                $form_data['success'] = 'Slider başarıyla güncellendi.';
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
