<?php

// VİZYON GENEL YAZISI
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'vision'
                      ");
$query->execute();
$generalInfoVision = $query->fetch();


// MİSYON GENEL YAZISI
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'mission'
                      ");
$query->execute();
$generalInfoMission = $query->fetch();


// TEMEL DEĞERLER GENEL YAZISI
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'core-values'
                      ");
$query->execute();
$generalInfoCoreValues = $query->fetch();

// İLKELER GENEL YAZISI
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'policy'
                      ");
$query->execute();
$generalInfoPolicy = $query->fetch();

// SÜRDÜRÜLEBİLİRLİK GENEL YAZISI
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'sustainability'
                      ");
$query->execute();
$generalInfoSustainability = $query->fetch();
