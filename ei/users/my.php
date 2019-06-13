<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
$u = $_SESSION["username"];
?>

<?php
require_once('config.php');
$sql = "SELECT * FROM users WHERE username='$u'";
$result = $link->query($sql);
$row = mysqli_fetch_array($result);
if ($row["fullname"] == '' || $row["city"] == '') {
    header("location: finish.php");
    exit;
}
?>

<?php require_once('../requires/header.php'); ?>
<style>
    @media only screen and (min-width: 650px) { .row { margin-top: 25px; } }
    @media only screen and (min-width: 768px) { #settings { max-width: 320px; border-radius: 10px; box-shadow: 0 2px 8px gray; }  }
    @media only screen and (max-width: 767px) { #settings { min-width: 80vw; width: 100%; margin-top: 25px; } }
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
    .settingsBtn {
        margin: 7px;
        padding: 7px;
    }
</style>
</head>

<body>

    <?php require_once('nav.php'); ?>
    <script>
        $(document).ready(function() {
            $("#navProfile").addClass("activehai");
            $("#navProfile .navImg").attr("src", "../img/nav/aprofile.png");
        });
    </script>

    <div class="container"><br><br>
        <div class="row">
            <div class="col" id="info">
                <div id="profilepic" style="background: url('<?php if($row["ploc"] != '') { echo $row["ploc"]; } else { echo "../img/profilepic/default.png"; } ?>'); background-size: contain; background-repeat: no-repeat; background-position: center; width: 140px; height: 140px; border-radius: 50%; border: 1px solid gray"></div><br>
                <h3><b><?php echo $row["fullname"]; ?></b></h3>
                <p>@<?php echo $u; ?></p>
                <h5>
                    <?php
                        if($row["bio"] != "") {
                            echo $row["bio"];
                        }
                        else { echo '<a class="btn btn-outline-dark" href="editprofile.php">Write about yourself <i class="material-icons-outlined">add</i></a>'; }
                    ?>
                </h5><br><br>
                
                <div class="details"><img src="../img/profiledetails/city.png" width="35" height="auto"> &nbsp; <?php if($row["city"] != "") { echo $row["city"]; } else { echo '<a class="btn btn-outline-dark" href="editprofile.php">Add City <i class="material-icons-outlined">add</i></a>'; } ?> </div>
                <div class="details"><img src="../img/profiledetails/phone.png" width="35" height="auto"> &nbsp; <?php if($row["phone"] != "") { echo $row["phone"]; } else { echo '<a class="btn btn-outline-dark" href="editprofile.php">Add Phone <i class="material-icons-outlined">add</i></a>'; } ?> </div>
                <div class="details"><img src="../img/profiledetails/college.png" width="35" height="auto"> &nbsp; <?php if($row["college"] != "") { echo $row["college"]; } else { echo '<a class="btn btn-outline-dark" href="editprofile.php">Add Education <i class="material-icons-outlined">add</i></a>'; } ?> </div>
                <div class="details"><img src="../img/profiledetails/bday.png" width="35" height="auto"> &nbsp; <?php if($row["bday"] != "") { echo $row["bday"]; } else { echo '<a class="btn btn-outline-dark" href="editprofile.php">Add B\'day <i class="material-icons-outlined">add</i></a>'; } ?> </div>
                <div class="details"><img src="../img/profiledetails/joined.png" width="35" height="auto"> &nbsp; <?php if($row["created_at"] != "") { echo $row["created_at"]; } else { } ?> </div>
                
            </div>
            <div id="settings" class="col">
                <br><h3><i class="material-icons-outlined">settings</i> <b>Settings</b></h3>
                <div class="dropdown-divider"></div><br>
                <a class="settingsBtn btn alert-primary" href="editprofile.php"><i class="material-icons-outlined">edit</i> Edit Profile</a>
                <a class="settingsBtn btn alert-warning" href="reset-password.php"><i class="material-icons-outlined">fiber_pin</i> Reset Password</a>
                <a class="settingsBtn btn alert-danger" href="logout.php"><i class="material-icons-outlined">power_settings_new</i> Logout</a>
                <a class="settingsBtn btn alert-success" href="../dev.php"><i class="material-icons-outlined">code</i> DevOps</a><br><br><br>
            </div>
        </div><br><br><br>
    </div>

    <?php require_once('../requires/footer.php'); ?>