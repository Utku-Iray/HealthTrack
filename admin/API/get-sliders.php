<?php

$sliderQuery = $vt->prepare("SELECT s.*, st.title
                           FROM slider s
                           INNER JOIN slider_translations st ON s.slider_id = st.slider_id
                           WHERE st.language_code = 'tr'");
$sliderQuery->execute();
$sliderResult = $sliderQuery->fetchAll(PDO::FETCH_OBJ);
