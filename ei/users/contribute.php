<?php
    $sqladd = "SELECT id, username, postloc, created_at FROM posts WHERE username='".$u."'";
    $resultadd = $conn->query($sqladd);
    $rowadd = mysqli_fetch_array($resultadd);
    
    if(isset($_POST['postbtn'])){

        if(file_exists($_FILES['profilepic']['tmp_name']) || is_uploaded_file($_FILES['profilepic']['tmp_name'])) {

            $target_dir = "../img/profilepic/";
            $target_file = $target_dir . basename($_FILES["profilepic"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST['updatebtn'])) {
                $check = getimagesize($_FILES["profilepic"]["tmp_name"]);
                if($check !== false) {
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
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                $newfilename = $target_dir.md5($target_file).'.'.$imageFileType;
                if (move_uploaded_file($_FILES["profilepic"]["tmp_name"], $newfilename)) {
                    $sqlpic = "UPDATE users SET imgloc='$newfilename' WHERE username='".$u."'";
                    if ($conn->query($sqlpic) === TRUE) { $ans = 1; }
                    else { echo "Error: " . $sqlpic . "<br>" . $conn->error; }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
?>


    <!-- Modal -->
    
</form>