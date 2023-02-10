<?php

$sliderQuery = $vt->prepare("SELECT s.*, st.title, st.content
                           FROM slider s
                           INNER JOIN slider_translations st ON s.slider_id = st.slider_id
                           WHERE st.language_code = '$selectedLang'
                           ORDER BY s.slider_sort ASC
                           ");
$sliderQuery->execute();
$sliderResult = $sliderQuery->fetchAll(PDO::FETCH_OBJ);


