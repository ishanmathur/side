<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
$u = $_SESSION["username"];
?>

<?php
require_once('../requires/header.php');
$sql = "SELECT id, fullname, city FROM users WHERE username='$u'";
$result = $link->query($sql);
$row = mysqli_fetch_array($result);
if ($row["fullname"] == '' || $row["city"] == '') {
    header("location: finish.php");
    exit;
}
?>
<style>
    #heroImg {
        position: fixed;
        max-width: 100vw;
        max-height: 100vh;
        width: 100%;
        height: 100%;
        background: url('../img/hero-home-1.jpg');
        background-size: cover;
        background-position: bottom right;
        background-repeat: no-repeat;
        z-index: -1;
        filter: brightness(150%) blur(2px);
    }
    @media only screen and (min-width: 600px) { .container-fliud { margin-top: 50px; } }
</style>
</head>

<body>

    <?php require_once('nav.php'); ?>
    <script>
        $(document).ready(function() {
            $("#navHome").addClass("activehai");
            $("#navHome i").removeClass("material-icons-outlined");
            $("#navHome i").addClass("material-icons");
        });
    </script>

    <!--<div id="heroImg"></div>-->

    <div class="container-fliud"><br>
        <h2 class="container"><b>Hi <?php $myName = explode(' ', $row["fullname"]); $myName = $myName[0]; echo $myName; ?></b></h2><br>
        <div id="follow">

        </div>
        <div class="row"></div>         
    </div>

    <?php require_once('../requires/footer.php'); ?>