<?php
$testOk = 0;
if(!isset($_COOKIE["loggedin"])){
    header("location: index.php");
    exit;
}
require_once('header.php');
$u = htmlspecialchars($_COOKIE["username"]);
$s = $_COOKIE["semester"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $testName = $_POST["testname"];
    $sql = "SELECT * FROM $testName";
    $result = $conn->query($sql);
    $testOk = 1;
} else {
    header("location: welcome.php");
    exit;
}
?>
<style>
</style>
</head>
<body>
    <h3 align="center"><?php echo $testName; ?></h3>
    <form action="eval.php" method="post">
        <?php
        if($testOk == 1) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<b>Q'.$row["id"].'</b> &nbsp; '.$row["ques"].'<br/>';
                    echo '<input type="radio" name="givenans" value="1">'.$row["opt1"].' &nbsp;
                        <input type="radio" name="givenans" value="2">'.$row["opt2"].' &nbsp;
                        <input type="radio" name="givenans" value="3">'.$row["opt3"].' &nbsp;
                        <input type="radio" name="givenans" value="4">'.$row["opt4"].' <br/><br/>';
                }
            }
        }
        ?><br/>
        <button type="submit">Submit</button>
    </form>
</body>
</html>