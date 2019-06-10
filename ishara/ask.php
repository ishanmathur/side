<?php
require_once('config.php');
$yourname = $_POST["yourname"];
$yournumberemail = $_POST["yournumberemail"];
$yoursuggest = $_POST["yoursuggest"];

$sql = "INSERT INTO suggest (yourname, yournumberemail, yoursuggest)
        VALUES ('$yourname', '$yournumberemail', '$yoursuggest')";

if ($conn->query($sql) === TRUE) {
    echo "<div style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>
            <h1>Thank you for your suggestion!!!</h1>
            <h4>You will be rediected to home page in 3 seconds...</h4>
         </div>";
    header( "refresh:4;url=index.php" );
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>