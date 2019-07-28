<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /");
    exit;
}
require_once('header.php');
$u = htmlspecialchars($_SESSION["username"]);
$s = $_SESSION["semester"];
$sql = "SELECT isAdmin FROM users WHERE username='$u'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
if($s != "users-admin") {
    header("location: welcome.php");
    exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $testName = $_POST["testname"];
    $testDate = $_POST["testdate"];
    $testDate = str_replace("-","_",$testDate);
    $finalName = $testName."_".$testDate;
    $sqlCreateTest = "CREATE TABLE $finalName (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        ques VARCHAR(1300),
        opt1 VARCHAR(210),
        opt2 VARCHAR(210),
        opt3 VARCHAR(210),
        opt4 VARCHAR(210),
        correctans VARCHAR(10)
        )";
    if ($conn->query($sqlCreateTest) === TRUE) {
        $sqlAddTestUserCol = "ALTER TABLE users ADD COLUMN $finalName VARCHAR(200)";
        if ($conn->query($sqlAddTestUserCol) === TRUE) {
           $_SESSION["testname"] = $finalName;
           header("location: createtest1.php");
        } else {
            echo $conn->error;
        }
    } else {
        echo $conn->error;
    }
}
?>
</head>
<body>
    <div align="center">
        <form action="" method="post">
            <label for="testname"><b>Test name:</b></label>
            <input required name="testname" id="testname" maxlength="45"><br/><br/>
            <label for="testdate"><b>When should test go live</b></label>
            <input required type="date" id="testdate" name="testdate"><br/><br/>
            <input type="submit" value="Go">
        </form>
    </div>
</body>
</html>