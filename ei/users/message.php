<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { header("location: login.php"); exit; }
else { $u = $_SESSION["username"]; }
require_once('../requires/header.php');
?>
</head>
<body>
    <?php require_once('nav.php'); ?>
    <script>
        $(document).ready(function() {
            $("#navMessage").addClass("activehai");
            $("#navMessage i").removeClass("material-icons-outlined");
            $("#navMessage i").addClass("material-icons");
        });
    </script>

    <?php require_once('../requires/footer.php'); ?>