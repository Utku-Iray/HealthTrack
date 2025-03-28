<?php
include "../../database/connection.php";

$selectedLanguage = trim($_POST["langDataHolder"]);
$selectedID = trim(filter_input(INPUT_POST, 'idHolderInput'));

$newsTitle = trim(filter_input(INPUT_POST, 'newsTitle-' . $selectedLanguage));
$newsShortContent = trim(filter_input(INPUT_POST, 'newsShortContent-' . $selectedLanguage));
$newsContent = $_POST['newsContent'];
$image = "newsImage";


$tmpFilePath = $_FILES[$image]['tmp_name'];
if (!empty($tmpFilePath)) {
    $filename = $_FILES[$image]["name"];
    $efilename = explode('.', $filename);
    $uzanti = $efilename[count($efilename) - 1];
    if ($uzanti != 'png' && $uzanti != 'jpg' && $uzanti != 'jpeg') {
        $errors['error'] = 'Fotoğraf türü JPG veya PNG olmalıdır.';
    }
}

$url = replace_tr($newsTitle);

if (
    empty($newsTitle) ||   empty($newsShortContent) ||   empty($newsContent)
) {
    $errors['error'] = 'Yıldızla işaretlenmiş bütün alanları doldurunuz.';
}


if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {
    $newsSelectQuery = $vt->prepare("SELECT n.*, nt.title, nt.short_content, nt.content, nt.news_id, nt.language_code
    FROM news n
    INNER JOIN news_translation nt ON n.news_id = nt.news_id
    WHERE n.news_id = '$selectedID'
    AND nt.language_code = '$selectedLanguage'
    ");
    $newsSelectQuery->execute();
    $newsSelectQueryResult = $newsSelectQuery->fetchAll(PDO::FETCH_OBJ);
    $newsSelectQueryResultCount = count($newsSelectQueryResult);

    $newsImageVal = $newsSelectQueryResult[0]->news_image;

    if ($newsSelectQueryResultCount > 0) {

        if (!empty($tmpFilePath)) {
            $removePathArray = array("attachments/", ".jpg", ".png", "news/");
            $imageReplacedValue = str_replace($removePathArray, "", $newsImageVal);
            if (file_exists('../../' . $newsImageVal)) {
                unlink('../../' . $newsImageVal);
            }
            if ($imageReplacedValue == $url) {
                move_uploaded_file($_FILES[$image]['tmp_name'], "../../" . $newsImageVal);
            } else if ($imageReplacedValue != $url) {
                $newLocation = "attachments/news/" . $url . "." . $uzanti;
                move_uploaded_file($_FILES[$image]['tmp_name'], "../../" . $newLocation);

                $updateImagePathQuery = $vt->prepare("UPDATE news SET news_image = '$newLocation' WHERE news_id = '$selectedID'");
                $updateImagePathQuery->execute();
            }
        }

        # UPDATE
        $updateQuery = $vt->prepare("UPDATE news_translation 
                                     SET title = :title, 
                                         short_content = :short_content,
                                         content = :content,
                                         url = :url
                                     WHERE news_id = '$selectedID'
                                     AND   language_code = '$selectedLanguage'");
        if ($updateQuery) {
            $updateResult = $updateQuery->execute([
                ':title' => $newsTitle,
                ':short_content' => $newsShortContent,
                ':content' => $newsContent,
                ':url' => $url,
            ]);
            if ($updateResult) {
                $form_data['status'] = true;
                $form_data['success'] = 'Haber başarıyla güncellendi.';
            }
        }
    } else {
        # INSERT
        $teamLanguageQuery = $vt->prepare('INSERT INTO news_translation (title, short_content, content, url, news_id, language_code)
         VALUES (:title, :short_content, :content, :url, :news_id, :language_code)');

        if ($teamLanguageQuery) {
            $teamLanguageQueryResult = $teamLanguageQuery->execute([
                ':title' => $newsTitle,
                ':short_content' => $newsShortContent,
                ':content' => $newsContent,
                ':url' => $url,
                ':news_id' => $selectedID,
                ':language_code' => $selectedLanguage,
            ]);
            if ($teamLanguageQueryResult) {
                $form_data['status'] = true;
                $form_data['success'] = 'Haber başarıyla güncellendi.';
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
