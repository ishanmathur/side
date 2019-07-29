<?php
if(!isset($_COOKIE["loggedinasadmin"])){
    header("location: /");
    exit;
}
require_once('header.php');
$u = htmlspecialchars($_COOKIE["username"]);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $testName = $_POST["testname"];
    $semester = $_POST["semester"];
    $testDate = $_POST["testdate"];
    $testTime = $_POST["testtime"];
    $testDate = str_replace("-","_",$testDate);
    $testDate = str_replace("2019_","",$testDate);
    $testTime = str_replace(":","_",$testTime);
    $finalName = $testName."_".$testDate."_".$testTime."__".$_COOKIE["username"];
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
        $sqlAddTestUserCol = "ALTER TABLE $semester ADD COLUMN $finalName VARCHAR(200)";
        if ($conn->query($sqlAddTestUserCol) === TRUE) {
           setcookie("testname", $finalName, time() + (86400 * 365));
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
            <label for="testdate"><b>Test date?</b></label>
            <input required type="date" id="testdate" name="testdate"><br/><br/>
            <label for="testtime"><b>Test time?</b></label>
            <input required type="time" id="testtime" name="testtime"><br/><br/>
            <select name="semester">
                <option value="users_third">III (Third)</option>
                <option value="users_fifth">V (fifth)</option>
                <option value="users_seventh">VII (seventh)</option>
            </select><br/><br/>
            <input type="submit" value="Go">
        </form>
    </div>
</body>
</html>