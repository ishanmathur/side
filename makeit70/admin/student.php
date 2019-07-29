<?php
if(!isset($_COOKIE["loggedinasadmin"])){
    header("location: index.php");
    exit;
}
require_once('header.php');
if(isset($_GET)) {
    $student_id = $_GET["id"];
    $semester = $_GET["semester"];
    $sql = "SELECT * FROM $semester WHERE id='$student_id'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    header("location: record.php");
    exit;
}
$u = htmlspecialchars($_COOKIE["username"]);
?>
<style>
</style>
</head>
<body>
    <h1><?php echo $row["fullname"]; ?> Records</h1>
    
    <?php
    $details = ['created_at', 'ladd', 'padd', 'phone', 'pphone', 'emailid', 'tenth', 'twelveth', 'enrollno'];
    $description = ['Created_at', 'Local Address', 'Permanent Address', 'Phone', 'Parents Phone', 'email-id', '10th Marks', '12th Marks', 'Enroll no'];
    for($i = 0; $i < sizeof($details); $i++){
        echo '<p>' . $description[$i] . ': ' . $row[$details[$i]] . '</p>';
    }
    ?>

</body>
</html>