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
require_once('config.php');
$sql = "SELECT id, fullname, city FROM users WHERE username='$u'";
$result = $link->query($sql);
$row = mysqli_fetch_array($result);
if ($row["fullname"] == '' || $row["city"] == '') {
    header("location: finish.php");
    exit;
}
?>

<?php require_once('../requires/header.php'); ?>
</head>

<body>

    <?php require_once('nav.php'); ?>
    <script>
        $(document).ready(function() {
            $("#navHome").css("color", "#007bff");
            $("#navHome").addClass("activehai");
        });
    </script>

    <div class="container"><br><br>
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </div>

    <?php require_once('../requires/footer.php'); ?>