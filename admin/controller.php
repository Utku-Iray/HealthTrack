<?php


if (!isset($_COOKIE["loginController"]) && $_COOKIE["loginController"] != "1") {
    header("location: login.php");
    $userId = "";
    $userMail = "";
    $userFullName = "";
} else {
    $userId = $_COOKIE["user_id"];
    $userMail = $_COOKIE["email"];
    $userFullName = $_COOKIE["fullname"];
}


$defaultLanguageQuery = $vt->prepare("SELECT l.*, lt.name, lt.main_code 
                                      FROM language l 
                                      INNER JOIN language_translations lt ON l.code = lt.main_code
                                      WHERE l.isDefault= 1");
$defaultLanguageQuery->execute();
$defaultLangResult = $defaultLanguageQuery->fetchAll(PDO::FETCH_OBJ);


$getAllLangWithAdminMainLangQuery = $vt->prepare("SELECT l.*, lt.name, lt.main_code
                                 FROM language l
                                 INNER JOIN language_translations lt ON l.code = lt.language_code
                                 WHERE lt.language_code = 'tr'");
$getAllLangWithAdminMainLangQuery->execute();
$allLangResult = $getAllLangWithAdminMainLangQuery->fetchAll(PDO::FETCH_OBJ);

$filteredLangArray = array();
foreach ($allLangResult as $singleLang) {
    array_push($filteredLangArray, $singleLang->main_code);
}
