<?php
include "../../database/connection.php";

$contactType = trim(filter_input(INPUT_POST, 'contactType'));
$contactContent = trim(filter_input(INPUT_POST, 'contactContent'));


if (
    empty($contactType) ||   empty($contactContent)
) {
    $errors['error'] = 'Yıldızla işaretlenmiş bütün alanları doldurunuz.';
}


if (!empty($errors)) {
    $form_data['status'] = false;
    $form_data['errors'] = $errors;
} else {

    $sorgu = $vt->prepare('INSERT INTO contact (contact_type, contact_content)
    VALUES (:contact_type, :contact_content)');
    if ($sorgu) {
        $result = $sorgu->execute([
            ':contact_type' => $contactType,
            ':contact_content' => $contactContent,
        ]);
        if ($result) {
            $form_data['status'] = true;
            $form_data['success'] = 'Yeni iletişim bilgisi başarıyla eklendi.';
        }
    }
}
echo json_encode($form_data);

die();
$vt = null;
