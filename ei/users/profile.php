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
require_once('../requires/header.php');
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
            $("#navSearch i").removeClass("material-icons-outlined");
            $("#navSearch i").addClass("material-icons");
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
            
            <?php if($row["city"] != "") { echo '<div class="details"><img src="../img/profiledetails/city.png" width="35" height="auto"> &nbsp;' . "Lives in <b>" . $row["city"] . "</b>" . '</div>'; } ?>
            <?php if($row["phone"] != "") { echo '<div class="details"><img src="../img/profiledetails/phone.png" width="35" height="auto"> &nbsp;' . "Contact <b>" . $row["phone"] . "</b>" . '</div>'; } ?>
            <?php if($row["college"] != "") { echo '<div class="details"><img src="../img/profiledetails/college.png" width="35" height="auto"> &nbsp;' . "Studies at <b>" . $row["college"] . "</b>" . '</div>'; } ?>
            <?php if($row["bday"] != "") { echo '<div class="details"><img src="../img/profiledetails/bday.png" width="35" height="auto"> &nbsp;' . "Wish on <b>" . $row["bday"] . "</b>" . '</div>'; } ?>
            <?php if($row["created_at"] != "") { $joined = substr($row["created_at"],0,10); echo '<div class="details"><img src="../img/profiledetails/joined.png" width="35" height="auto"> &nbsp;' . "Joined on <b>" . $joined . "</b>" . '</div>'; } ?>
            
        </div>
        <br><br><br>
    </div>

    <?php require_once('../requires/footer.php'); ?>