<?php
require_once('../requires/header.php');
if (!empty($_GET)) {
    $q = $_GET['q'];
}
require_once('config.php');
?>
<style>
    @media only screen and (min-width: 600px) {
        #searchBox { top: 60px; }
        .container { margin-top: 50px; }
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

    <div align="center" id="searchBox" class="sticky-top navbar-light bg-light">
        <form action='' method='get'>
            <div class="btn input-group" style="max-width: 550px;">
                <input type="search" value="<?php if (!empty($_GET)) { echo $q; } ?>" class="form-control" style="border-radius: 50px; height: 40px;" placeholder="search..." name='q' aria-label="search" aria-describedby="basic-addon1">
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
        if (isset($_GET['qOut'])) {
            if (strlen($q) < 3) {
                
            }
            else {
                $sqlStore = "";

                $sql = "SELECT * FROM users WHERE fullname LIKE '%" . $q . "' OR username LIKE '%" . $q . "%' OR phone LIKE '%" . $q . "%' OR city LIKE '%" . $q . "%'";
                $result = $link->query($sql);

                echo '<div>';
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row['ploc'] != '') { $contactspic = $row["ploc"]; }
                        else { $contactspic = '../img/profilepic/default.png'; }
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
                    echo "<i class='material-icons'>pool</i><br>Hmm... Can't find anyone<br><img id='bgcontacts' src='../img/hugo-co-workers.png'>";
                }
                echo "</div>";    
            }
        }

        ?><br><br><br>
    </div>

    <?php require_once('../requires/footer.php'); ?>