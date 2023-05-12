<?php

// DİLE AİT ÇEVİRİLER
$query = $vt->prepare("SELECT l.*, lt.name, lt.main_code, lt.language_code
                      FROM language l
                      INNER JOIN language_translations lt ON l.code = lt.language_code
                      WHERE lt.language_code = '$selectedLang'
                      ");
$query->execute();
$languageTranslations = $query->fetchAll(PDO::FETCH_OBJ);
