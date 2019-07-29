<?php
if(!isset($_COOKIE["loggedinasadmin"])){
    header("location: index.php");
    exit;
}
require_once('header.php');
$u = htmlspecialchars($_COOKIE["username"]);
?>
<style>
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even) {
        background-color: #dddddd;
    }
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
        echo '<h3>List of students of '.$semester.'</h3>';
        if ($result->num_rows > 0) {
            echo '<table>
            <tr><th>Name</th><th>SID</th></tr>';
            while($row = $result->fetch_assoc()) {
                echo '<tr><th><a href="student.php?id='.$row["id"].'&semester='.$semester.'" target="_BLANK">' . $row["fullname"] . '</a></th><th>' . $row["username"] . '</th></tr>';
            }
        } else {
            echo "No Students";
        }
        $conn->close();
    }
    ?>

</body>
</html>