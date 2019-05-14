<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<?php require_once('../header.php'); $u = htmlspecialchars($_SESSION["username"]); $what="";  ?>

<?php
    if(isset($_POST['postbtn'])){

        if(file_exists($_FILES['postfile']['tmp_name']) || is_uploaded_file($_FILES['postfile']['tmp_name'])) {

            $target_dir = "../img/posts/";
            $target_file = $target_dir . basename($_FILES["postfile"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST['postbtn'])) {
                $check = getimagesize($_FILES["postfile"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $what = "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check file size
            if ($_FILES["postfile"]["size"] > 500000) {
                $what = "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $what = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $what = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                $newfilename = $target_dir.$u."_".md5($target_file).'.'.$imageFileType;
                if (move_uploaded_file($_FILES["postfile"]["tmp_name"], $newfilename)) {
                    $sqlpic = "INSERT INTO posts (username, postloc)
                               VALUES ('$u', '$newfilename')";
                    if ($conn->query($sqlpic) === TRUE) { $what = 'Post Added Successfully!!!'; }
                    else { $what = "Error: " . $sqlpic . "<br>" . $conn->error; }
                } else {
                    $what = "Sorry, there was an error uploading your file.";
                }
            }
        }
    }

    if(isset($_POST['deletebtn'])){
        $todelete = $_POST["deleteval"];
        $deletequery = "DELETE FROM posts WHERE postloc='".$todelete."'";
        if ($conn->query($deletequery) === TRUE) {
            $what = "Record removed.";
        }
        else { $what = "Error deleting record: " . $conn->error; }
    }
?>

<?php
    $sql = "SELECT * FROM users WHERE username='".$u."'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);

    $sqlworks = "SELECT * FROM posts WHERE username='".$u."'";
    $resultworks = $conn->query($sqlworks);
    $rowworks = mysqli_fetch_array($resultworks);
?>

<link rel="stylesheet" href="../css/welcome.css">

    <?php require_once('nav.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col" id="info"><br>
                <div style="background: url('../img/user-min.png'); background-size: cover; background-position: center;" id="profilepic"></div>
                <h3>@<b><?php echo $u; ?></b></h3>
                <h3 style="color: black;"><b><?php echo $row["fullname"]; ?> </b></h3><br>
                
                <button id="contribute" class="btn btn-primary" data-toggle="modal" data-target="#contributeModal"><i class="material-icons">note_add</i><b>&nbsp; Commit</b></button>

                <?php if($what != "") { echo '<br><div style="margin: 5px; padding: 5px; max-width: 95%;" class="btn btn-outline-danger">' . $what . '</div>'; } ?>

                <div style="z-index: 9999;" class="modal fade" id="contributeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Share your works!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <img id="blah" src="" width="250px" height="auto"/><br><br>
                                    <input type="file" name="postfile" id="fileToUpload">
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="postbtn" class="btn btn-primary">Post</button>
                                </form>
                            </div>
                            <script>
                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            $('#blah').attr('src', e.target.result);
                                        }

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }

                                $("#fileToUpload").change(function(){
                                    readURL(this);
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <?php
                    if($row["phone"] != "") { echo '<div class="details"><img src="../img/phone.png" width="35" height="auto"> &nbsp; '.$row["phone"].'</div>'; }
                ?>
                
            </div>
            <div class="col" id="settings">
                <h3><i class="material-icons">settings</i> <b>Settings</b></h3><div class="dropdown-divider"></div><br>
                <?php if($row["whos"] == "allowhai") { echo '<a class="btn btn-outline-danger" href="../admin/index.php"><i class="material-icons">account_balance</i><b>&nbsp; Admin Panel</b></a>'; } ?>
                <a href="editprofile.php" class="btn alert-success"><i class="material-icons">edit</i><b> Edit Profile</b></a>
                <a href="reset-password.php" class="btn alert-warning"><i class="material-icons">fiber_pin</i><b> Reset Password</b></a>
                <a href="logout.php" class="btn alert-danger"><i class="material-icons">power_settings_new</i><b> Log Out</b></a>
            </div>
        </div>

        <div id="myworks" align="center">
            <br><h2><b>My Works...</b></h2><br>
            <?php
                if ($resultworks->num_rows > 0) {
                    $colorpallete = ['primary', 'dark', 'success', 'danger', 'warning'];
                    $j = 0;
                    // output data of each row
                    while($rowworks = $resultworks->fetch_assoc()) {
                        
                            echo '
                                <div class="btn alert-'.$colorpallete[$j].'" style="margin: 10px; padding: 10px; width: 220px; border-radius: 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                    <a href="'.$rowworks["postloc"].'" target="_BLANK">
                                        <img src="'.$rowworks["postloc"].'" alt="..."  width="200px" height="auto">
                                    </a>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <input type="hidden" name="deleteval" value="'.$rowworks["postloc"].'" />
                                            <button type="submit" name="deletebtn" class="btn btn-outline-'.$colorpallete[$j].'">Delete this post</button>
                                        </form>
                                    </div>
                                </div>
                            ';
                            if($j + 1 >= sizeof($colorpallete)) { $j = -1; }
                            $j++;
                        }
                    
                } else {
                    echo "Start posting your art by clicking COMMIT!!!";
                }
            ?>
        </div>
    </div>

    <?php require_once('../footer.php'); ?>