<?php


// MAIN HOST INFORMATION

// try {
//     $servername = "";

//     $databasename = '';

//     $username = "";

//     $password = "";

//     $vt = new PDO("mysql:host=$servername;dbname=$databasename;charset=utf8", $username, $password);
//     // set the PDO error mode to exception
//     $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }


// DEVELOPMENT PROCESS - HOST INFORMATION

try {
    $servername = "server.essehost.com";

    $databasename = 'essehost_healthtrack';

    $username = "essehost_admin";

    $password = "Essebilisim2023.";

    $vt = new PDO("mysql:host=$servername;dbname=$databasename;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
