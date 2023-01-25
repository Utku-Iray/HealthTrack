<?php


$query = $vt->prepare("SELECT n.*, nt.title, nt.language_code
                       FROM news n
                       INNER JOIN news_translation nt ON n.news_id = nt.news_id
                       WHERE nt.language_code = 'tr'
                       ORDER BY n.news_click_count DESC
                       LIMIT 10
                       ");
$query->execute();
$mostClickNews = $query->fetchAll(PDO::FETCH_OBJ);

$query = $vt->prepare("SELECT t.*, tt.name, tt.language_code 
                       FROM treatments t
                       INNER JOIN treatments_translation tt ON t.treatment_id = tt.treatment_id
                       WHERE tt.language_code = 'tr'
                       ORDER BY t.treatment_click_count DESC
                       LIMIT 10
                       ");
$query->execute();
$mostClickTreatments = $query->fetchAll(PDO::FETCH_OBJ);
