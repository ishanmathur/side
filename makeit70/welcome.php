<?php
if(!isset($_COOKIE["loggedin"])){
    header("location: index.php");
    exit;
}
require_once('header.php');
$u = htmlspecialchars($_COOKIE["username"]);
$s = $_COOKIE["semester"];
$sql = "SELECT * FROM $s WHERE username='$u'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
?>
<style>
    a { display: block; margin: 10px; }
</style>
</head>
<body>

    <?php require_once('nav.php'); ?>

    <h1>Hi, <b><?php echo $row["fullname"]; ?></b>. Welcome to our site.</h1>

    <form action="test.php" method="post">
        <?php
        $time_now = date("m_d_H_i");
        $test_tables = array();
        $sqlTest = "SELECT COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_SCHEMA = 'gvbss' AND TABLE_NAME = '$s'";
        $resultTest = $conn->query($sqlTest);
        $thirteen = 0;
        if ($resultTest->num_rows > 12) {
            echo '<h3>Select test to attempt!</h3>';
            echo '<select name="testname">';
            while($rowTest = mysqli_fetch_row($resultTest)) {
                if($thirteen>12){
                    echo '<option value="'.$rowTest[0].'">'.$rowTest[0].'</option>';
                }
                $thirteen++;
            }
            echo '</select><br/><br/>';
            echo '<input type="submit" value="Go"> &nbsp; <b>(Test will start right away)</b>';
        } else {
            echo "No Tests";
        }
        ?>
    </form><br/><br/>

    <a href="reset-password.php">Reset Your Password</a>
    <a href="logout.php">Sign Out of Your Account</a>
    <h3>Your details</h3>
    <button type="button" onclick="details()">Show</button>
    <div id="details" style="display:none">
        <?php
        $details = ['created_at', 'ladd', 'padd', 'phone', 'pphone', 'emailid', 'tenth', 'twelveth', 'enrollno'];
        $description = ['Created_at', 'Local Address', 'Permanent Address', 'Your Phone', 'Parents Phone', 'email-id', '10th Marks', '12th Marks', 'Enroll no'];
        for($i = 0; $i < sizeof($details); $i++){
            echo '<p>' . $description[$i] . ': ' . $row[$details[$i]] . '</p>';
        }
        ?>
        <button type="button" onclick="hide_details()">Hide</button>
    </div>
    <script>
        var detailsdiv = document.getElementById("details");
        function details(){
            detailsdiv.style.display = 'block';
        }
        function hide_details(){
            detailsdiv.style.display = 'none';
        }
    </script>
</body>
</html>