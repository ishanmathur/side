<?php
if(!isset($_COOKIE["loggedinasadmin"])){
    header("location: index.php");
    exit;
}
require_once('header.php');
$u = htmlspecialchars($_COOKIE["username"]);
$sql = "SELECT * FROM users_admin WHERE username='$u'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
?>
<style>
    a { display: block; margin: 10px; }
</style>
</head>
<body>

    <?php require_once('../nav.php'); ?>

    <h1>Hi, <b><?php echo $row["username"]; ?></b>. Welcome to our site.</h1>

    <a href="createtest.php">Create Test</a>
    <a href="stat.php">Test Statstics</a>
    <a href="record.php">Student Record</a>
    <a href="reset-password.php">Reset Your Password</a>
    <a href="logout.php">Sign Out of Your Account</a>
</body>
</html>