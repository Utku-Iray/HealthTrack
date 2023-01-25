<?php
include "../../database/connection.php";


$selectedLanguage = trim($_POST["langDataHolder"]);
$selectedID = trim(filter_input(INPUT_POST, 'idHolderInput'));

$memberName = trim(filter_input(INPUT_POST, 'memberName-' . $selectedLanguage));
$memberTitle = trim(filter_input(INPUT_POST, 'memberTitle-' . $selectedLanguage));
$memberDescription = trim(filter_input(INPUT_POST, 'memberDescription-' . $selectedLanguage));
$image = 'memberImage-' . $selectedLanguage;

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

    if ($memberResultCount > 0) {
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
