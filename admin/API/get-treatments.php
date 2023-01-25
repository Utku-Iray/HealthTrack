<?php

$treatmentsQuery = $vt->prepare("SELECT t.*, tt.name 
                              FROM treatments t
                              INNER JOIN treatments_translation tt ON t.treatment_id = tt.treatment_id
                              WHERE tt.language_code = 'tr'
                              ");
$treatmentsQuery->execute();
$treatmentsResult = $treatmentsQuery->fetchAll(PDO::FETCH_OBJ);
