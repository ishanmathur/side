<?php
setcookie("loggedinasadmin", "", time() - 3600);
setcookie("id", "", time() - 3600);
setcookie("username", "", time() - 3600);
header("location: index.php");
exit;
?>