<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /");
    exit;
}
require_once('header.php');
$u = htmlspecialchars($_SESSION["username"]);
/*$s = $_SESSION["semester"];
$sql = "SELECT isAdmin FROM $s WHERE username='$u'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
if($s != "users-admin") {
    header("location: /");
    exit;
}*/
?>
<style>
</style>
</head>
<body>
    <h1>Student Records</h1>
    <p>Select semester</p>
    <form action="" method="get">
        <select name="semester">
            <option value="users_third">III (Third)</option>
            <option value="users_fifth">V (fifth)</option>
            <option value="users_seventh">VII (seventh)</option>
        </select> &nbsp;
        <input type="submit" value="Submit">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $semester = $_GET["semester"];
        $sql = "SELECT id, username, fullname FROM $semester";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo '<h3>List of students of '.$semester.'</h3>';
            while($row = $result->fetch_assoc()) {
                echo "Name: " . $row["fullname"]. " SID: " . $row["username"]. "<br>";
            }
        } else {
            echo "No Students";
        }
        $conn->close();
    }
    ?>

</body>
</html>