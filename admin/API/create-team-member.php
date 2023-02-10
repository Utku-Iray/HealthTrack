<?php
include "../../database/connection.php";

$defaultLanguage = trim(filter_input(INPUT_POST, 'defaultLanguage'));
$memberName = trim(filter_input(INPUT_POST, 'memberName'));
$memberTitle = trim(filter_input(INPUT_POST, 'memberTitle'));
$memberDescription = trim(filter_input(INPUT_POST, 'memberDescription'));
$image = "memberImage";

$tmpFilePath = $_FILES[$image]['tmp_name'];

$filename = $_FILES[$image]["name"];
$efilename = explode('.', $filename);

$uzanti = $efilename[count($efilename) - 1];
$location  = "attachments/team/nonSelectedProfilePhoto.png";

if (
    empty($memberName) ||   empty($memberTitle) ||   empty($memberDescription)
) {
    $errors['error'] = 'Yıldızla işaretlenmiş bütün alanları doldurunuz.';
}
if ($tmpFilePath != "") {
    if ($uzanti != "png" && $uzanti != "jpg" && $uzanti != "jpeg") {
        $errors['error'] = 'Seçilen fotoğraf türü PNG veya JPG olmalıdır.';
    }
}

if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {

    $spaceRemovedName = replace_tr($memberName);
    $nameWithURL = $spaceRemovedName . "." . $uzanti;


    if ($tmpFilePath != "") {
        $location  = "attachments/team/" . $nameWithURL;
        if (file_exists('../../attachments/team/' . $nameWithURL)) {
            unlink('../../attachments/team/' . $nameWithURL);
        }
        move_uploaded_file($_FILES[$image]['tmp_name'], "../../attachments/team/" . $nameWithURL);
    }


    $teamInsertQuery = $vt->prepare('INSERT INTO team_members (member_name, member_photo, member_sort)
    VALUES (:member_name, :member_photo, :member_sort)');
    if ($teamInsertQuery) {
        $teamInsertQueryResult = $teamInsertQuery->execute([
            ':member_name' => $memberName,
            ':member_photo' => $location,
            ':member_sort' => "0",
        ]);
        if ($teamInsertQueryResult) {
            $teamInsertQueryID = $vt->lastInsertId();

            $teamLanguageQuery = $vt->prepare('INSERT INTO team_members_translation (title, description, member_id, language_code)
            VALUES (:title, :description, :member_id, :language_code)');

            if ($teamLanguageQuery) {
                $teamLanguageQueryResult = $teamLanguageQuery->execute([
                    ':title' => $memberTitle,
                    ':description' => $memberDescription,
                    ':member_id' => $teamInsertQueryID,
                    ':language_code' => $defaultLanguage,
                ]);
                if ($teamLanguageQueryResult) {
                    $form_data['status'] = true;
                    $form_data['success'] = 'Yeni ekip üyesi başarıyla eklendi.';
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
