<?php

// ABOUT US GENEL YAZISI
$query = $vt->prepare("SELECT g.*, gt.title, gt.description
                      FROM general g
                      INNER JOIN general_translations gt ON g.general_id = gt.general_id
                      WHERE gt.language_code = '$selectedLang'
                      AND g.general_content_id = 'about-us'
                      ");
$query->execute();
$generalInfoAboutUs = $query->fetch();
