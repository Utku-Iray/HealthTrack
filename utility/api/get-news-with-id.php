<?php
$urlQuery = $vt->prepare("SELECT nt.*
                           FROM news_translation nt
                           WHERE nt.url = '$newsURL'
                           ");
$urlQuery->execute();
$urlQueryResult = $urlQuery->fetch();

$nid = $urlQueryResult["news_id"];



$newsQuery = $vt->prepare("SELECT n.*, nt.title, nt.short_content, nt.content, nt.url
                           FROM news n
                           INNER JOIN news_translation nt ON n.news_id = nt.news_id
                           WHERE nt.language_code = '$selectedLang'
                           AND nt.news_id = '$nid'
                           ");
$newsQuery->execute();
$selectedNewsResult = $newsQuery->fetch();




