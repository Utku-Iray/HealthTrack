<?php
include "../../database/connection.php";

$defaultLanguage = trim(filter_input(INPUT_POST, 'defaultLanguage'));

$newsTitle = trim(filter_input(INPUT_POST, 'newsTitle'));
$newsShortContent = trim(filter_input(INPUT_POST, 'newsShortContent'));
$newsContent = $_POST['newsContent'];
$image = "newsImage";

$tmpFilePath = $_FILES[$image]['tmp_name'];
$filename = $_FILES[$image]["name"];
$efilename = explode('.', $filename);
$uzanti = $efilename[count($efilename) - 1];
$location  = "";


$marks = array("(", ")", "?", ",", ":", "/");
$newsTitleLower = strtolower($newsTitle);
$spaceRemovedTitle = str_replace(" ", "-", $newsTitleLower);
$url = str_replace($marks, "", $spaceRemovedTitle);

if (
    empty($newsTitle) ||   empty($newsShortContent) ||   empty($newsContent) ||   empty($filename)
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
        $location  = "attachments/news/" . $nameWithURL;
        if (file_exists('../../attachments/news/' . $nameWithURL)) {
            unlink('../../attachments/news/' . $nameWithURL);
        }
        move_uploaded_file($_FILES[$image]['tmp_name'], "../../attachments/news/" . $nameWithURL);
    }

    $newsInsertQuery = $vt->prepare('INSERT INTO news (news_image, news_click_count, news_sort)
    VALUES (:news_image, :news_click_count, :news_sort)');
    if ($newsInsertQuery) {
        $newsInsertQueryResult = $newsInsertQuery->execute([
            ':news_image' => $location,
            ':news_click_count' => "0",
            ':news_sort' => "0",
        ]);
        if ($newsInsertQueryResult) {
            $newsInsertQueryID = $vt->lastInsertId();
            $newsLanguageQuery = $vt->prepare('INSERT INTO news_translation (title, short_content, content, url, news_id, language_code)
            VALUES (:title, :short_content, :content, :url, :news_id, :language_code)');
            if ($newsLanguageQuery) {
                $newsLanguageQueryResult = $newsLanguageQuery->execute([
                    ':title' => $newsTitle,
                    ':short_content' => $newsShortContent,
                    ':content' => $newsContent,
                    ':url' => $url,
                    ':news_id' => $newsInsertQueryID,
                    ':language_code' => $defaultLanguage,
                ]);
                if ($newsLanguageQueryResult) {
                    $form_data['status'] = true;
                    $form_data['success'] = 'Yeni haber başarıyla eklendi.';
                }
            }
        }
    }
}

echo json_encode($form_data);

die();
$vt = null;
