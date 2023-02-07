<?php


// ESSE


// try {
//     $servername = "server.essehost.com";

//     $databasename = 'essehost_healthtrack';

//     $username = "essehost_admin";

//     $password = "Essebilisim2023.";

//     $vt = new PDO("mysql:host=$servername;dbname=$databasename;charset=utf8", $username, $password);
//     // set the PDO error mode to exception
//     $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }



// guzel

try {
    $servername = "ni-jungle.guzelhosting.com";

    $databasename = "ideapoln_proje_health";

    $username = "ideapoln_admin";

    $password = "ideapol.123.123";
    
    $vt = new PDO("mysql:host=$servername;dbname=$databasename;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}



