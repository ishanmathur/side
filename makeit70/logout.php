<?php
setcookie("loggedin", "", time() - 3600);
setcookie("id", "", time() - 3600);
setcookie("username", "", time() - 3600);
setcookie("semester", "", time() - 3600);
header("location: index.php");
exit;
?>