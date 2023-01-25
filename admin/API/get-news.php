<?php

$newsQuery = $vt->prepare("SELECT n.*, nt.title
                           FROM news n
                           INNER JOIN news_translation nt ON n.news_id = nt.news_id
                           WHERE nt.language_code = 'tr'");
$newsQuery->execute();
$newsResult = $newsQuery->fetchAll(PDO::FETCH_OBJ);
