<?php

$newsQuery = $vt->prepare("SELECT n.*, nt.title, nt.short_content, nt.content, nt.url
                           FROM news n
                           INNER JOIN news_translation nt ON n.news_id = nt.news_id
                           WHERE nt.language_code = '$selectedLang'
                           AND nt.url = '$newsURL'
                           ");
$newsQuery->execute();
$selectedNewsResult = $newsQuery->fetch();
