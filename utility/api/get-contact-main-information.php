<?php


$query = $vt->prepare("SELECT * FROM contact WHERE contact_isDefault = 1 AND contact_type = 'Telefon'");
$query->execute();
$contactMainPhone = $query->fetch();


$query = $vt->prepare("SELECT * FROM contact WHERE contact_isDefault = 1 AND contact_type = 'E-posta'");
$query->execute();
$contactMainEmail = $query->fetch();


$query = $vt->prepare("SELECT * FROM contact WHERE contact_isDefault = 1 AND contact_type = 'Adres'");
$query->execute();
$contactMainAddress = $query->fetch();
