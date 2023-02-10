<?php



$sliderIDQuery = $vt->prepare("SELECT s.*, st.title, st.content, st.slider_id, st.language_code
                             FROM slider s
                             INNER JOIN slider_translations st ON s.slider_id = st.slider_id
                             WHERE s.slider_id = '$urlSliderID'
                              ");
$sliderIDQuery->execute();
$sliderIDQueryResult = $sliderIDQuery->fetchAll(PDO::FETCH_OBJ);

$filteredSliderLangCodeArray = array();
foreach ($sliderIDQueryResult as $singleSliderData) {
    array_push($filteredSliderLangCodeArray, $singleSliderData->language_code);
}
