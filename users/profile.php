<?php
if(isset($_GET['id'])) { $id = $_GET['id']; }
else { header("location: q.php"); exit; }
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { $u = ''; }
else { $u = $_SESSION["username"]; }
?>

<?php
require_once('config.php');
$sql = "SELECT * FROM users WHERE id='$id'";
$result = $link->query($sql);
$row = mysqli_fetch_array($result);
?>

<?php
$sqlprofileExist = "SELECT username, whoprofile, profilefreq FROM profiles WHERE username='" . $u . "' AND whoprofile='" . $row["username"] . "'";
$resultprofileExist = $link->query($sqlprofileExist);
$rowprofileExist = mysqli_fetch_array($resultprofileExist);
if ($resultprofileExist->num_rows > 0) {
    $incr = $rowprofileExist["profilefreq"];
    $incr = $incr + 1;
    $sqlprofile = "UPDATE profiles SET profilefreq=$incr WHERE username='$u' AND whoprofile='" . $row["username"] . "'";
}
else { $sqlprofile = "INSERT INTO profiles (username, whoprofile) VALUES ('$u', '" . $row["username"] . "')"; }
if ($link->query($sqlprofile) != TRUE) { echo "Error: " . $sqlprofile . "<br>" . $link->error; }
?>

<?php require_once('../requires/header.php'); ?>
<style>
    @media only screen and (min-width: 650px) { .container { margin-top: 25px; } }
    #info h3, #info p, #info h5 { margin-left: 20px; }
    #info p { color: gray; }
    #info h5 {
        max-width: 350px;
        margin: 5px;
        padding: 7px;
        color: gray;
        border-left: 1px solid #a6a6a6;
        border-radius: 10px;
    }
    #info .details {
        margin: 5px;
        padding: 5px;
        font-size: 18px;
        font-weight: bold;
    }
</style>
</head>

<body>

    <?php require_once('nav.php'); ?>
    <script>
        $(document).ready(function() {
            $("#navSearch").addClass("activehai");
        });
    </script>

    <div class="container"><br><br>
        <div id="info">
            <div id="profilepic" style="background: url('<?php if($row["ploc"] != '') { echo $row["ploc"]; } else { echo "../img/profilepic/default.png"; } ?>'); background-size: contain; background-repeat: no-repeat; background-position: center; width: 140px; height: 140px; border-radius: 50%; border: 1px solid gray"></div><br>
            <h3><b><?php echo $row["fullname"]; ?></b></h3>
            <p>@<?php echo $row["username"]; ?></p>
            <h5>
                <?php
                    if($row["bio"] != "") { echo $row["bio"]; }
                ?>
            </h5><br><br>
            
            <?php if($row["city"] != "") { echo '<div class="details"><img src="../img/profiledetails/city.png" width="35" height="auto"> &nbsp;' . $row["city"] . '</div>'; } ?>
            <?php if($row["phone"] != "") { echo '<div class="details"><img src="../img/profiledetails/phone.png" width="35" height="auto"> &nbsp;' . $row["phone"] . '</div>'; } ?>
            <?php if($row["college"] != "") { echo '<div class="details"><img src="../img/profiledetails/college.png" width="35" height="auto"> &nbsp;' . $row["college"] . '</div>'; } ?>
            <?php if($row["bday"] != "") { echo '<div class="details"><img src="../img/profiledetails/bday.png" width="35" height="auto"> &nbsp;' . $row["bday"] . '</div>'; } ?>
            <?php if($row["created_at"] != "") { echo '<div class="details"><img src="../img/profiledetails/joined.png" width="35" height="auto"> &nbsp;' . $row["created_at"] . '</div>'; } ?>
            
        </div>
        <br><br><br>
    </div>

    <?php require_once('../requires/footer.php'); ?>