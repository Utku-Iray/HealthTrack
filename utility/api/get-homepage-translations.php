<?php

// HİZMET GENEL YAZISI
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'service1'
                      ");
$query->execute();
$generalInfoService1 = $query->fetch();

// HİZMET GENEL YAZISI 2
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'service2'
                      ");
$query->execute();
$generalInfoService2 = $query->fetch();


// HİZMET GENEL YAZISI 3
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'service3'
                      ");
$query->execute();
$generalInfoService3 = $query->fetch();


// HİZMET GENEL YAZISI 4
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'service4'
                      ");
$query->execute();
$generalInfoService4 = $query->fetch();


// PRENSİP GENEL YAZISI
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'principle1'
                      ");
$query->execute();
$generalInfoPrinciple1 = $query->fetch();

// PRENSİP GENEL YAZISI 2
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'principle2'
                      ");
$query->execute();
$generalInfoPrinciple2 = $query->fetch();

// PRENSİP GENEL YAZISI 3
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'principle3'
                      ");
$query->execute();
$generalInfoPrinciple3 = $query->fetch();

// BANNER GENEL YAZISI
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'banner1'
                      ");
$query->execute();
$generalInfoBanner1 = $query->fetch();

// BANNER GENEL YAZISI 2
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'banner2'
                      ");
$query->execute();
$generalInfoBanner2 = $query->fetch();
