<?php

$_COOKIE["loginController"] = "";
$_COOKIE["user_id"] = "";
$_COOKIE["email"] = "";
$_COOKIE["fullname"] = "";


setcookie("loginController", "", time() - 1, "/");
setcookie("user_id", "", time() - 1, "/");
setcookie("email", "", time() - 1, "/");
setcookie("fullname", "", time() - 1, "/");

header("location: login.php");
