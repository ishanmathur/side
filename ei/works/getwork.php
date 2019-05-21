<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../users/login.php");
    exit;
}
?>

<?php require_once('../header.php');
$u = htmlspecialchars($_SESSION["username"]);
$sqlworkadd = "SELECT * FROM posts WHERE username='" . $u . "'";
$resultworkadd = $conn->query($sqlworkadd);
$rowworkadd = mysqli_fetch_array($resultworkadd);


$shouldans = 0;


if (file_exists($_FILES['imgone']['tmp_name']) || is_uploaded_file($_FILES['imgone']['tmp_name'])) {

    $target_dir = "../img/posts/";
    $target_file = $target_dir . basename($_FILES["imgone"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST['postbtn'])) {
        $check = getimagesize($_FILES["imgone"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check file size
    if ($_FILES["imgone"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        $newfilename = $target_dir . $u . "_" . md5($target_file) . date("Y/m/d") . '.' . $imageFileType;
        if (move_uploaded_file($_FILES["imgone"]["tmp_name"], $newfilename)) {
            $sqlpic = "UPDATE posts SET imgoneloc='$newfilename' WHERE username='" . $u . "'";
            if ($conn->query($sqlpic) === TRUE) {
                echo "Profile pic updated !";
            } else {
                echo "Error: " . $sqlpic . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file." . "<br>";
        }
    }
}

$title = $_POST['title'];
$paraone = $_POST['paraone'];
$paratwo = $_POST['paratwo'];

$sqladdtext = "INSERT INTO posts (title, paraone, paratwo)
            VALUES ('$title', '$paraone', '$paratwo')";

if ($conn->query($sqladdtext) === TRUE) {
    $shouldans = 1;
} else {
    $shouldans = 0;
    echo "Error: " . $sqladdtext . "<br>" . $conn->error;
}

?>