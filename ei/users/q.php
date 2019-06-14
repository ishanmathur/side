<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { $u = ''; }
else { $u = $_SESSION["username"]; }
if (!empty($_GET)) { $q = $_GET['q']; }
require_once('../requires/header.php');
?>
<style>
    @media only screen and (min-width: 600px) {
        #searchBox { top: 55px; }
        .container { margin-top: 50px; }
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

    <div align="center" id="searchBox" class="sticky-top navbar-light bg-light"><br>
        <form action='' method='get'>
            <div class="btn input-group" style="max-width: 550px;">
                <input type="search" value="<?php if (!empty($_GET)) {
                                                echo $q;
                                            } ?>" class="form-control" style="border-radius: 50px; height: 40px;" placeholder="search..." name='q' aria-label="search" aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                    &nbsp;&nbsp;<button class="input-group-text" id="basic-addon1" type='submit' style="border-radius: 50px; height: 40px;" name='qOut'><i style="color: #007bff;" class="material-icons">search</i></button>
                </div>
            </div>
        </form>
        <!--<div>
            <ul class="nav nav-fill">
                <li class="nav-item">
                    <button id='homeBtn' class="btn searchTools" onclick="psh()"><i class="material-icons-outlined" style="color: gray; font-size: 30px;">person</i> </button>
                </li>
                <li class="nav-item">
                    <button id='phoneBtn' class="btn searchTools" onclick="bsh()"><i class="material-icons-outlined" style="color: gray; font-size: 30px;">phone</i> </button>
                </li>
                <li class="nav-item">
                    <button id='cityBtn' class="btn searchTools" onclick="psh()"><i class="material-icons-outlined" style="color: gray; font-size: 30px;">location_city</i> </button>
                </li>
                <li class="nav-item">
                    <button id='moreBtn' class="btn searchTools" onclick="bsh()"><i class="material-icons-outlined" style="color: gray; font-size: 30px;">info</i> </button>
                </li>
            </ul>
        </div>-->
    </div>
    <div class="container">
        <?php
            function plzSuggest() {
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                    $u = $_SESSION["username"];
                    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                    echo "<br><h4 style='color: gray'>Recent Searches: </h4>";
                    $sqlSuggestSearch = "SELECT whosearch, searchfreq FROM searches WHERE username='" . $u . "'";
                    $resultSuggestSearch = $link->query($sqlSuggestSearch);
                    if ($resultSuggestSearch->num_rows > 0) {
                        $i = 0;
                        while ($rowSuggestSearch = $resultSuggestSearch->fetch_assoc()) {
                            echo "
                            <form action='' method='get'>
                                <input style='display: none;' value='" . $rowSuggestSearch["whosearch"] . "' name='q'>
                                <button style='color: gray' class='btn' type='submit' name='qOut'>" . $rowSuggestSearch["whosearch"] . " &nbsp; <i class='material-icons-outlined' style='font-size: 15px; font-weight: bold;'>call_made</i></button><br>
                            </form>
                            <div class='dropdown-divider'></div>";
                            if($i == 3) { break; }
                            $i++;
                        }
                    }
                }
                echo "<img src='../img/searchTools/bg.png' style='max-width: 400px; width: 90%; height: auto; position: fixed; bottom: 0; left: 50%; transform: translate(-50%, -50%);'>";
            }
        ?>
        <?php
        if (!isset($_GET['qOut'])) {
            plzSuggest();
        } else {
            if(strlen($q) == 0) {
                plzSuggest();
            }
            else if (strlen($q) < 3) {
                echo "<h5 align='center'><i class='material-icons-outlined'>warning</i> Min 3 Characters <i class='material-icons-outlined'>warning</i></h5>
                <img src='../img/searchTools/bg.png' style='max-width: 400px; width: 90%; height: auto; position: fixed; bottom: 0; left: 50%; transform: translate(-50%, -50%);'>";
            } 
            else if (strlen($q) > 45) {
                echo "<h5 align='center'><i class='material-icons-outlined'>warning</i> Max 45 Characters <i class='material-icons-outlined'>warning</i></h5>
                <img src='../img/searchTools/bg.png' style='max-width: 400px; width: 90%; height: auto; position: fixed; bottom: 0; left: 50%; transform: translate(-50%, -50%);'>";
            } else {
                $sqlsearchExist = "SELECT username, whosearch, searchfreq FROM searches WHERE username='" . $u . "' AND whosearch='" . $q . "'";
                $resultsearchExist = $link->query($sqlsearchExist);
                $rowsearchExist = mysqli_fetch_array($resultsearchExist);
                if ($resultsearchExist->num_rows > 0) {
                    $incr = $rowsearchExist["searchfreq"];
                    $incr = $incr + 1;
                    $sqlsearch = "UPDATE searches SET searchfreq=$incr WHERE username='$u' AND whosearch='$q'";
                } else {
                    $sqlsearch = "INSERT INTO searches (username, whosearch) VALUES ('$u', '$q')";
                }
                if ($link->query($sqlsearch) != TRUE) {
                    echo "Error: " . $sqlsearch . "<br>" . $link->error;
                }

                $sql = "SELECT * FROM users WHERE fullname LIKE '%" . $q . "' OR username LIKE '%" . $q . "%' OR phone LIKE '%" . $q . "%' OR city LIKE '%" . $q . "%'";
                $result = $link->query($sql);

                echo '<div>';
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row['ploc'] != '') {
                            $contactspic = $row["ploc"];
                        } else {
                            $contactspic = '../img/profilepic/default.png';
                        }
                        echo "<a class='alert' style='margin: 5px; padding: 5px; bordeer-radius: 10px;' href='profile.php?id=" . $row['id'] . "'>
                                <div class='row'>
                                    <div class='col' style='margin-left: 5px; max-width: 60px;'>  
                                        <div style='border-radius: 50px; border: 1px solid gray; width: 45px; height: 45px; background: url(" . $contactspic . "); background-size: cover;' id='profilepic'></div>
                                    </div>
                                    <div class='col'>
                                        <h6><b style='color: black'>" . $row['fullname'] . "</b><span style='color: gray; display: block;'>@" . $row['username'] . "</span></h6>
                                    </div>
                                </div>
                            </a>";
                    }
                } else {
                    echo "<h4 align='center'><i class='material-icons-outlined' style='font-size: 100px;'>pool</i> <br> Hmm... Can't find anyone</h4>
                    <img src='../img/searchTools/bg.png' style='max-width: 400px; width: 90%; height: auto; position: fixed; bottom: 0; left: 50%; transform: translate(-50%, -50%);'>";
                }
                echo "</div>";
            }
        }
        ?><br><br><br>
    </div>

    <?php require_once('../requires/footer.php'); ?>