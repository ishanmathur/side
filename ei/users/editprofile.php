<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>
<?php require_once('../header.php'); ?>
<?php
$u = htmlspecialchars($_SESSION["username"]);
$sqledit = "SELECT * FROM users WHERE username='" . $u . "'";
$resultedit = $conn->query($sqledit);
$rowedit = mysqli_fetch_array($resultedit);

if (isset($_POST['updatebtn'])) {

    if (file_exists($_FILES['profilepic']['tmp_name']) || is_uploaded_file($_FILES['profilepic']['tmp_name'])) {

        $target_dir = "../img/profilepic/";
        $target_file = $target_dir . basename($_FILES["profilepic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST['updatebtn'])) {
            $check = getimagesize($_FILES["profilepic"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check file size
        if ($_FILES["profilepic"]["size"] > 500000) {
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
            $newfilename = $target_dir . $u . "_" . md5($target_file) . '.' . $imageFileType;
            if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $newfilename)) {
                $sqlpic = "UPDATE users SET pimgloc='$newfilename' WHERE username='" . $u . "'";
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

    $bio = $_POST['bio'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $bday = $_POST['bday'];

    $sql = "UPDATE users SET bio='$bio', phone='$phone', city='$city', bday='$bday' WHERE username='" . $u . "'";
    if ($conn->query($sql) === TRUE) {
        echo "<br>" . "Profile details updated!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<style>
    form {
        max-width: 450px;
    }

    i {
        vertical-align: middle;
    }
</style>

<link rel="stylesheet" href="../css/editprofile.css">

<?php require_once('nav.php'); ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="container"><br>
        <h2><i class="material-icons">settings</i> <b>Settings</b></h2>
        <a style="color: red;" href="welcome.php"><i class="material-icons">keyboard_arrow_left</i> Cancel</a>
        <div class="dropdown-divider"></div><br>
        <div style="width: 85px; height: 85px; background: url('<?php if ($rowedit["pimgloc"] != '') {
                                                                    echo "../" . $rowedit["pimgloc"];
                                                                } else {
                                                                    echo "../img/nav/user.png";
                                                                } ?>'); background-position: center; background-size: contain; background-repeat: no-repeat;" id="output"></div>
        </a><br>
        <input type="file" onchange="loadFile(event)" name="profilepic" id="profilepic"><label for="profilepic"><i class="material-icons">edit</i><b> Change</b></label><br>
        <script>
            var loadFile = function(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        <br><br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="material-icons">star_border</i><b>&nbsp; Bio</b></span>
            </div>
            <textarea maxlength="99" name="bio"><?php echo $rowedit["bio"]; ?></textarea>
        </div><br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="material-icons">phone</i></span>
            </div>
            <input type="text" name="phone" pattern="[1-9]{10}" value="<?php echo $rowedit["phone"]; ?>" class="form-control" placeholder="Phone Number" aria-label="Phone Number" aria-describedby="basic-addon1">
        </div><br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="material-icons">location_on</i></span>
            </div>
            <input type="text" name="city" value="<?php echo $rowedit["city"]; ?>" name="city" class="form-control" placeholder="City" aria-label="City" aria-describedby="basic-addon1">
        </div><br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="material-icons">cake</i></span>
            </div>
            <input type="date" min="1900-01-01" max="2025-12-31" value="<?php echo $rowedit["bday"]; ?>" name="bday" class="form-control" aria-describedby="basic-addon1">
        </div><br><br><br><br>
    </div>
    <button id="updatebtn" type="submit" name="updatebtn" class="btn-primary"><i class="material-icons">done_all</i><b> Update</b></button>
</form>

<?php require_once('../footer.php'); ?>