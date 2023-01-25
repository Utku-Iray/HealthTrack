<?php

$newsIDQuery = $vt->prepare("SELECT n.*, nt.title, nt.short_content, nt.content, nt.news_id, nt.language_code
                              FROM news n
                              INNER JOIN news_translation nt ON n.news_id = nt.news_id
                              WHERE n.news_id = '$urlNewsID'
                              ");
$newsIDQuery->execute();
$newsIDQueryResult = $newsIDQuery->fetchAll(PDO::FETCH_OBJ);

$filteredNewsLangCodeArray = array();
foreach ($newsIDQueryResult as $singleNewsData) {
    array_push($filteredNewsLangCodeArray, $singleNewsData->language_code);
}
