<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /");
    exit;
}
require_once('header.php');
$u = htmlspecialchars($_SESSION["username"]);
$sql = "SELECT * FROM users WHERE username='$u'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
?>

</head>
<body>
    <h1>Hi, <b><?php echo $u; ?></b>. Welcome to our site.</h1>
    <a href="reset-password.php">Reset Your Password</a>
    <a href="logout.php">Sign Out of Your Account</a>
    <?php
    if($row["isAdmin"] == 1) {
        echo '<a href="createtest.php">Create a test</a>';
    }
    ?>
</body>
</html>