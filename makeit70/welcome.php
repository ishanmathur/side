<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /");
    exit;
}
require_once('header.php');
$u = htmlspecialchars($_SESSION["username"]);
$s = $_SESSION["semester"];
$sql = "SELECT * FROM $s WHERE username='$u'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
?>
<style>
    a { display: block; margin: 10px; }
</style>
</head>
<body>
    <h1>Hi, <b><?php echo $row["fullname"]; ?></b>. Welcome to our site.</h1>
    <?php
    if($s == "users_admin") {
        echo '<a href="createtest.php">Create a test</a>
        <a href="record.php">Student Record</a>
        <a href="teststat.php">Test Statstics</a>';
    }
    ?>
    <a href="reset-password.php">Reset Your Password</a>
    <a href="logout.php">Sign Out of Your Account</a>
    <?php
    if($s != "users_admin") {
        echo '<h3>Your details</h3>';
        $details = ['created_at', 'ladd', 'padd', 'phone', 'pphone', 'emailid', 'tenth', 'twelveth', 'semester', 'enrollno'];
        $description = ['Created_at', 'Local Address', 'Permanent Address', 'Your Phone', 'Parents Phone', 'email-id', '10th Marks', '12th Marks', 'Semester', 'Enroll no'];
        for($i = 0; $i < sizeof($details); $i++){
            echo '<h5>' . $description[$i] . ': ' . $row[$details[$i]] . '</h5>';
        }
    }
    ?>
</body>
</html>