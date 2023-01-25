<?php
include "../../database/connection.php";

$newsID = trim($_POST["newsID"]);


$query = $vt->prepare("SELECT * FROM news WHERE news_id='$newsID'");
$query->execute();
$newsResult = $query->fetchAll(PDO::FETCH_OBJ);


$newsImage = $newsResult[0]->news_image;

$deleteNewsLangQuery = $vt->prepare("DELETE FROM news_translation WHERE news_id ='$newsID'");
$deleteNewsLangResult = $deleteNewsLangQuery->execute();

if ($deleteNewsLangResult) {
    $deleteNewsQuery = $vt->prepare("DELETE FROM news WHERE news_id ='$newsID'");
    $deleteNewsResult = $deleteNewsQuery->execute();
    if ($deleteNewsResult) {
        $form_data['status'] = true;
        $form_data['message'] = 'Haber başarıyla silindi.';


        if (file_exists('../../' . $newsImage)) {
            unlink('../../' . $newsImage);
        }
    }
} else {
    $form_data['status'] = false;
    $form_data['message'] = 'Bir sorun yaşanıyor. Lütfen daha sonra tekrar deneyiniz.';
}
echo json_encode($form_data);
die();
$vt = null;
