<?php
date_default_timezone_set("Asia/Kolkata");
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'gvbss');
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($conn === false){ die("ERROR: Could not connect. " . mysqli_connect_error()); }
?>