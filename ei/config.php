<?php
    $servernamedb = "localhost";
    $usernamedb = "root";
    $passworddb = "";
    $dbnamedb = "ekdb";
    $conn = new mysqli($servernamedb, $usernamedb, $passworddb, $dbnamedb);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
?>