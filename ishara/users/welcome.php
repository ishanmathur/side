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
    if(isset($_POST['deletebtn'])){
        $todelete = $_POST["deleteval"];
        $deletequery = "DELETE FROM posts WHERE imgoneloc='".$todelete."'";
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
?>

<link rel="stylesheet" href="../css/welcome.css">

    <?php require_once('../navbar.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col" id="info"><br>
                <div style="background: url('<?php if($row["pimgloc"] != '') { echo $row["pimgloc"]; } else { echo "../img/nav/user.png"; } ?>'); background-size: contain; background-repeat: no-repeat; background-position: center;" id="profilepic"></div>
                <h3>@<b><?php echo $u; ?></b></h3>
                <?php
                    if($row["bio"] != "") {
                        echo '&nbsp; &nbsp; <b> Bio</b> :
                              <h5>'.$row["bio"].'</h5>'; 
                    }
                ?><br>
                <h3 style="color: black;"><b><?php echo $row["fullname"]; ?> </b></h3>
                
                <a href="../works/contribute.php" id="contribute" class="btn btn-primary"><i class="material-icons">note_add</i><b>&nbsp; Commit</b></a>

                <?php if($what != "") { echo '<br><div style="margin: 5px; padding: 5px; max-width: 95%;" class="btn btn-outline-danger">' . $what . '</div>'; } ?>

                <br><?php
                    if($row["city"] != "") { echo '<div class="details"><img src="../img/profiledetails/city.png" width="35" height="auto"> &nbsp; '.$row["city"].'</div>'; }
                    if($row["phone"] != "") { echo '<div class="details"><img src="../img/profiledetails/phone.png" width="35" height="auto"> &nbsp; '.$row["phone"].'</div>'; }
                    if($row["bday"] != "") { echo '<div class="details"><img src="../img/profiledetails/bday.png" width="35" height="auto"> &nbsp; '.$row["bday"].'</div>'; }
                    if($row["created_at"] != "") { echo '<div class="details"><img src="../img/profiledetails/joined.png" width="35" height="auto"> &nbsp; '.$row["created_at"].'</div>'; }
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
            <br><h2><b>My Blogs...</b></h2><br>
            <?php
                if ($resultworks->num_rows > 0) {
                    $colorpallete = ['primary', 'dark', 'success', 'danger', 'warning'];
                    $j = 0;
                    // output data of each row
                    while($rowworks = $resultworks->fetch_assoc()) {
                        
                            echo '
                                <div class="btn alert-'.$colorpallete[$j].'" style="margin: 10px; padding: 10px; width: 220px; border-radius: 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                    <img src="'.$rowworks["imgoneloc"].'" alt="..."  width="200px" height="auto">
                                    <div class="card-body">
                                        <h3>'.$rowworks["title"].'</h3>
                                        <form action="" method="post">
                                            <input type="hidden" name="deleteval" value="'.$rowworks["imgoneloc"].'" />
                                            <button type="submit" name="deletebtn" class="btn btn-outline-'.$colorpallete[$j].'">Delete this post</button>
                                        </form>
                                    </div>
                                </div>
                            ';
                            if($j + 1 >= sizeof($colorpallete)) { $j = -1; }
                            $j++;
                        }
                    
                } else {
                    echo "Start posting blogs on your profile by clicking COMMIT!!!";
                }
            ?>
        </div>
    </div>

    <?php require_once('../footer.php'); ?>