<?php
include "../../database/connection.php";


$selectedLanguage = trim($_POST["langDataHolder"]);
$selectedID = trim(filter_input(INPUT_POST, 'idHolderInput'));

$memberName = trim(filter_input(INPUT_POST, 'memberName-' . $selectedLanguage));
$memberTitle = trim(filter_input(INPUT_POST, 'memberTitle-' . $selectedLanguage));
$memberDescription = trim(filter_input(INPUT_POST, 'memberDescription-' . $selectedLanguage));
$image = "memberImage";

$tmpFilePath = $_FILES[$image]['tmp_name'];
if (!empty($tmpFilePath)) {
    $filename = $_FILES[$image]["name"];
    $efilename = explode('.', $filename);
    $uzanti = $efilename[count($efilename) - 1];
    if ($uzanti != 'png' && $uzanti != 'jpg' && $uzanti != 'jpeg') {
        $errors['error'] = 'Fotoğraf türü JPG veya PNG olmalıdır.';
    }
}

$url = replace_tr($memberName);

if (
    empty($memberName) ||   empty($memberTitle) ||   empty($memberDescription)
) {
    $errors['error'] = 'Yıldızla işaretlenmiş bütün alanları doldurunuz.';
}


if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {
    $membersQuery = $vt->prepare("SELECT tm.*, tmt.title 
                              FROM team_members tm
                              INNER JOIN team_members_translation tmt ON tm.member_id = tmt.member_id
                              WHERE tmt.language_code = '$selectedLanguage'
                              AND tm.member_id = '$selectedID'
                              ");
    $membersQuery->execute();
    $membersResult = $membersQuery->fetchAll(PDO::FETCH_OBJ);
    $memberResultCount = count($membersResult);

    $memberImageVal = $membersResult[0]->member_photo;

    if ($memberResultCount > 0) {

        if (!empty($tmpFilePath)) {
            $removePathArray = array("attachments/", ".jpg", ".png", "team/");
            $imageReplacedValue = str_replace($removePathArray, "", $memberImageVal);
            if (file_exists('../../' . $memberImageVal)) {
                unlink('../../' . $memberImageVal);
            }
            if ($imageReplacedValue == $url) {
                move_uploaded_file($_FILES[$image]['tmp_name'], "../../" . $memberImageVal);
            } else if ($imageReplacedValue != $url) {
                $newLocation = "attachments/team/" . $url . "." . $uzanti;
                move_uploaded_file($_FILES[$image]['tmp_name'], "../../" . $newLocation);

                $updateImagePathQuery = $vt->prepare("UPDATE team_members SET member_photo = '$newLocation' WHERE member_id = '$selectedID'");
                $updateImagePathQuery->execute();
            }
        }

        # Single Update
        if ($memberName != $membersResult[0]->member_name) {
            $updateQuery1 = $vt->prepare("UPDATE team_members SET member_name = :member_name WHERE member_id = '$selectedID'");
            $updateQuery1->execute([':member_name' => $memberName]);
        }

        # UPDATE
        $updateQuery = $vt->prepare("UPDATE team_members_translation 
                                     SET title = :title, 
                                         description = :description
                                     WHERE member_id='$selectedID'
                                     AND   language_code='$selectedLanguage'");
        if ($updateQuery) {
            $updateResult = $updateQuery->execute([
                ':title' => $memberTitle,
                ':description' => $memberDescription,
            ]);
            if ($updateResult) {
                $form_data['status'] = true;
                $form_data['success'] = 'Üye başarıyla güncellendi.';
            }
        }
    } else {
        # INSERT
        $teamLanguageQuery = $vt->prepare('INSERT INTO team_members_translation (title, description, member_id, language_code)
        VALUES (:title, :description, :member_id, :language_code)');

        if ($teamLanguageQuery) {
            $teamLanguageQueryResult = $teamLanguageQuery->execute([
                ':title' => $memberTitle,
                ':description' => $memberDescription,
                ':member_id' => $selectedID,
                ':language_code' => $selectedLanguage,
            ]);
            if ($teamLanguageQueryResult) {
                $form_data['status'] = true;
                $form_data['success'] = 'Üye başarıyla güncellendi.';
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
