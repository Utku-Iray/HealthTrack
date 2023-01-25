<?php
include "../../database/connection.php";

$memberID = trim($_POST["memberID"]);

$query = $vt->prepare("SELECT * FROM team_members WHERE member_id='$memberID'");
$query->execute();
$memberResult = $query->fetchAll(PDO::FETCH_OBJ);

$memberPhoto = $memberResult[0]->member_photo;


$deleteMemberLangQuery = $vt->prepare("DELETE FROM team_members_translation WHERE member_id ='$memberID'");
$deleteMemberLangResult = $deleteMemberLangQuery->execute();
if ($deleteMemberLangResult) {
    $deleteMemberQuery = $vt->prepare("DELETE FROM team_members WHERE member_id ='$memberID'");
    $deleteMemberResult = $deleteMemberQuery->execute();
    if ($deleteMemberResult) {
        $form_data['status'] = true;
        $form_data['message'] = 'Ekip üyesi başarıyla silindi!';

        if (strpos($memberPhoto, 'nonSelectedProfilePhoto') === false) {
            if (file_exists('../../' . $memberPhoto)) {
                unlink('../../' . $memberPhoto);
            }
        }
    }
} else {
    $form_data['status'] = false;
    $form_data['message'] = 'Bir sorun yaşanıyor. Lütfen daha sonra tekrar deneyiniz.';
}
echo json_encode($form_data);
die();
$vt = null;
