<?php
session_start();

if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = "tr";
} else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {

    if ($_GET['lang'] == "tr") {
        $_SESSION['lang'] = "tr";
    }
    else  if ($_GET['lang'] == "en") {
        $_SESSION['lang'] = "en";
    }
}


require_once "lang/" . $_SESSION['lang'] . ".php";

$langQuery = $_GET;


$selectedLang = $_SESSION['lang'];
