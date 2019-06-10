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

$oneerr = $twoerr = 0;
$newfilenameone = $newfilenametwo = "";

if (file_exists($_FILES['imgone']['tmp_name']) || is_uploaded_file($_FILES['imgone']['tmp_name'])) {

    $target_dir_one = "../img/posts/";
    $target_file_one = $target_dir_one . basename($_FILES["imgone"]["name"]);
    $uploadOk_one = 1;
    $imageFileType_one = strtolower(pathinfo($target_file_one, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST['postbtn'])) {
        $check_one = getimagesize($_FILES["imgone"]["tmp_name"]);
        if ($check_one !== false) {
            $uploadOk_one = 1;
        } else {
            echo "File is not an image.";
            $uploadOk_one = 0;
        }
    }
    // Check file size
    if ($_FILES["imgone"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk_one = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType_one != "jpg" && $imageFileType_one != "png" && $imageFileType_one != "jpeg"
        && $imageFileType_one != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk_one = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk_one == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        $newfilename_one = $target_dir_one . $u . "_" . md5($target_file_one) . "_" . time() . '.' . $imageFileType_one;
        if (move_uploaded_file($_FILES["imgone"]["tmp_name"], $newfilename_one)) {
            $oneerr = 0;
        } else {
            $oneerr = 1;
            echo "Sorry, there was an error uploading your file." . "<br>";
        }
    }
}

if (file_exists($_FILES['imgtwo']['tmp_name']) || is_uploaded_file($_FILES['imgtwo']['tmp_name'])) {

    $target_dir_two = "../img/posts/";
    $target_file_two = $target_dir_two . basename($_FILES["imgtwo"]["name"]);
    $uploadOk_two = 1;
    $imageFileType_two = strtolower(pathinfo($target_file_two, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST['postbtn'])) {
        $check_two = getimagesize($_FILES["imgtwo"]["tmp_name"]);
        if ($check_two !== false) {
            $uploadOk_two = 1;
        } else {
            echo "File is not an image.";
            $uploadOk_two = 0;
        }
    }
    // Check file size
    if ($_FILES["imgtwo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk_two = 0;
    }
    // Allow certain file formats
    if (
        $imageFileType_two != "jpg" && $imageFileType_two != "png" && $imageFileType_two != "jpeg"
        && $imageFileType_two != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk_two = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk_two == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        $newfilename_two = $target_dir_two . $u . "_" . md5($target_file_two) . "_" . time() . '.' . $imageFileType_two;
        if (move_uploaded_file($_FILES["imgtwo"]["tmp_name"], $newfilename_two)) {
            $twoerr = 0;
        } else {
            $twoerr = 1;
            echo "Sorry, there was an error uploading your file." . "<br>";
        }
    }
}

$title = $_POST['title'];
$paraone = $_POST['paraone'];
$paratwo = $_POST['paratwo'];

if ($oneerr != 1 && $twoerr != 1) {
    $sqladdpost = "INSERT INTO posts (username, title, paraone, paratwo, imgoneloc, imgtwoloc)
    VALUES ('$u', '$title', '$paraone', '$paratwo', '$newfilename_one', '$newfilename_two')";
    if ($conn->query($sqladdpost) === TRUE) {
        header("location: ../users/welcome.php");
    } else {
        echo "Error: " . $sqladdpost . "<br>" . $conn->error;
    }
}

?>