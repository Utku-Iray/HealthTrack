<?php
include "../../database/connection.php";



$defaultLanguage = trim(filter_input(INPUT_POST, 'defaultLanguage'));

$sliderTitle = trim(filter_input(INPUT_POST, 'sliderTitle'));
$sliderShortContent = trim(filter_input(INPUT_POST, 'sliderShortContent'));
$sliderLink = trim(filter_input(INPUT_POST, 'sliderLink'));

$image = "sliderImage";




$tmpFilePath = $_FILES[$image]['tmp_name'];
$filename = $_FILES[$image]["name"];
$efilename = explode('.', $filename);
$uzanti = $efilename[count($efilename) - 1];
$location  = "";

$url = replace_tr($sliderTitle);




if (
    empty($sliderTitle) ||   empty($sliderShortContent) ||   empty($sliderLink) ||   empty($filename)
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
        $location  = "attachments/slider/" . $nameWithURL;
        if (file_exists('../../attachments/slider/' . $nameWithURL)) {
            unlink('../../attachments/slider/' . $nameWithURL);
        }
        move_uploaded_file($_FILES[$image]['tmp_name'], "../../attachments/slider/" . $nameWithURL);
    }


    $sliderInsertQuery = $vt->prepare('INSERT INTO slider (slider_link, slider_image, slider_sort)
VALUES (:slider_link, :slider_image, :slider_sort)');
    if ($sliderInsertQuery) {
        $sliderInsertQueryResult = $sliderInsertQuery->execute([
            ':slider_link' => $sliderLink,
            ':slider_image' => $location,
            ':slider_sort' => "0",
        ]);
        if ($sliderInsertQueryResult) {
            $sliderInsertQueryID = $vt->lastInsertId();
            $sliderLanguageQuery = $vt->prepare('INSERT INTO slider_translations (title, content, slider_id, language_code)
            VALUES (:title, :content, :slider_id, :language_code)');
            if ($sliderLanguageQuery) {
                $sliderLanguageQueryResult = $sliderLanguageQuery->execute([
                    ':title' => $sliderTitle,
                    ':content' => $sliderShortContent,
                    ':slider_id' => $sliderInsertQueryID,
                    ':language_code' => $defaultLanguage,
                ]);
                if ($sliderLanguageQueryResult) {
                    $form_data['status'] = true;
                    $form_data['success'] = 'Yeni slider başarıyla eklendi.';
                }
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
