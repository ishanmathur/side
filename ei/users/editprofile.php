<?php
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>
<?php require_once('../header.php'); ?>
<?php
    $u = htmlspecialchars($_SESSION["username"]);
    $sqledit = "SELECT id, phone FROM users WHERE username='".$u."'";
    $resultedit = $conn->query($sqledit);
    $rowedit = mysqli_fetch_array($resultedit);

    if(isset($_POST['updatebtn'])){

        $phone = $_POST['phone'];

        $sql = "UPDATE users SET phone='$phone' WHERE username='".$u."'";
        if ($conn->query($sql) === TRUE) { echo "<script> alert ('Profile Updated Succesfully!!!'); </script>"; }
        else { echo "<script> alert ('Error: " . $sql . "<br>" . $conn->error."'); </script>"; }
    }

?>

<style>
    form { max-width: 450px; }
    i {vertical-align: middle; }
    
</style>

    <?php require_once('nav.php'); ?>

    <form action="" method="post">
        <div class="container"><br>
            <h2><i class="material-icons">settings</i> <b>Settings</b></h2>
            <a style="color: red;" href="welcome.php"><i class="material-icons">keyboard_arrow_left</i> Cancel</a>
            <div class="dropdown-divider"></div><br>
            <br><br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="material-icons">phone</i></span>
                </div>
                <input type="text" name="phone" pattern="[1-9]{10}" value="<?php echo $rowedit["phone"]; ?>" class="form-control" placeholder="Phone Number" aria-label="Phone Number" aria-describedby="basic-addon1">
            </div><br>
            <button id="updatebtn" type="submit" name="updatebtn" class="btn btn-primary"><i class="material-icons">done_all</i><b> Update</b></button><br>
    </form>

    <?php require_once('../footer.php'); ?>