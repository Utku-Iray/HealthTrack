<?php

$treatmentsQuery = $vt->prepare("SELECT t.*, tt.name, tt.content, tt.url, tt.short_content
                              FROM treatments t
                              INNER JOIN treatments_translation tt ON t.treatment_id = tt.treatment_id
                              WHERE tt.language_code = '$selectedLang'
                              AND t.isVisible = 1
                              ORDER BY tt.name ASC
                              ");
$treatmentsQuery->execute();
$treatmentsResult = $treatmentsQuery->fetchAll(PDO::FETCH_OBJ);


// ANASAYFA EN ÇOK TIKLANAN TEDAVİLER
$treatmentsQuery = $vt->prepare("SELECT t.*, tt.name, tt.content, tt.url, tt.short_content
                              FROM treatments t
                              INNER JOIN treatments_translation tt ON t.treatment_id = tt.treatment_id
                              WHERE tt.language_code = '$selectedLang'
                              ORDER BY t.treatment_click_count DESC
                              LIMIT 3
                              ");
$treatmentsQuery->execute();
$treatmentsResultForHome = $treatmentsQuery->fetchAll(PDO::FETCH_OBJ);
