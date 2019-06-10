<?php
require_once('header.php');
if (!empty($_GET)) {
    $search = $_GET['search'];
}
?>
<style>
    #bgcontacts {
        z-index: -2;
        margin: 10px;
        width: 250px;
        height: auto;
    }
    @media only screen and (min-width: 768px) { #blogwid { max-width: 275px; } }
    #blogwid:hover {
        transform: scale(0.9);
    }
</style>
</head>

<body>

    <?php require_once('navbar.php'); ?>

    <br>
    <h2 style="margin: 8px; padding: 8px;"><b>Explore . . .</b></h2>
    <div class="container">
        <div class="sticky-top" style="top: 65px; background: #f2f2f2;">
            <form action='' method='get'>
                <div class="btn input-group mb-3" style="max-width: 550px;">
                    <input type="search" value="<?php if (!empty($_GET)) { echo $search; } ?>" class="form-control" style="border-radius: 50px; height: 45px;" placeholder="search..." name='search' aria-label="search" aria-describedby="basic-addon1">
                    <div class="input-group-prepend">
                        &nbsp;&nbsp;<button class="input-group-text" id="basic-addon1" type='submit' style="border-radius: 50px; height: 45px;" name='searchIshara'><i style="vertical-align: middle; color: #007bff;" class="material-icons">search</i></button>
                    </div>
                </div>
            </form>

            <div align="center">
                <button id='blogsbtn' class="btn" onclick="bsh()" style='border-bottom: 3px solid;'><img src="../img/nav/works.png" width="35px" height="auto"> &nbsp; Blogs</button>
                <button id='peoplebtn' class="btn" onclick="psh()"><img src="../img/user-min.png" width="35px" height="auto"> &nbsp; People</button>
            </div>
        </div>

        <br><br>
        
        <?php
        if (isset($_GET['searchIshara'])) {
            if (strlen($search) >= 3) {

                $sqlpeople = "SELECT * FROM users WHERE username LIKE '%" . $search . "%' OR fullname LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%'";
                $resultpeople = $conn->query($sqlpeople);
                $sqlblog = "SELECT * FROM posts WHERE username LIKE '%" . $search . "%' OR title LIKE '%" . $search . "%' OR paraone LIKE '%" . $search . "%' OR paratwo LIKE '%" . $search . "%'";
                $resultblog = $conn->query($sqlblog);

                
                
                echo '<div>';

                echo '<div id="people" style="display: none;">';
                echo "<h1><b>People</b></h1><br>";
                if ($resultpeople->num_rows > 0) {
                    while ($rowpeople = $resultpeople->fetch_assoc()) {
                        if ($rowpeople['pimgloc'] != '') {
                            $contactspic = $rowpeople["pimgloc"];
                        } else {
                            $contactspic = 'img/nav/user.png';
                        }
                        echo "<a style='text-decoration: none;' href='../users/profile.php?id=" . $rowpeople['id'] . "'>
                                <div class='row'>
                                    <div class='col' style='margin-left: 5px; max-width: 60px;'>  
                                        <div style='border-radius: 50px; border: 1px solid #3399ff; width: 45px; height: 45px; background: url(" . $contactspic . "); background-size: cover;' id='profilepic'></div>
                                    </div>
                                    <div class='col'>
                                        <h6><span style='color: black;'>@" . $rowpeople['username'] . "</span><br><span style='color: gray;'>" . $rowpeople['fullname'] . "</span></h6>
                                    </div>
                                </div>
                            </a>
                            <div style='max-width: 450px; height: 10px; border-bottom: 1px solid #a6a6a6;'></div>";
                    }
                } else {
                    echo "<i class='material-icons'>pool</i><br>Hmm... Can't find anyone<br><img id='bgcontacts' src='../img/hugo-co-workers.png'>";
                }
                echo "</div>";

                echo '<div id="blogs" align="center" style="position: relative">';
                echo "<h1 align='left'><b>Blogs</b></h1><br>";
                if ($resultblog->num_rows > 0) {
                    while ($rowblog = $resultblog->fetch_assoc()) {
                        echo "<a id='blogwid' href='../works/b.php?id=".$rowblog["id"]."' class='btn' style='margin: 5px; border-radius: 15px; width: 99%; height: 275px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);'>
                                <div style='border-radius: 15px; width: 235px; height: 150px; background: url(".$rowblog["imgoneloc"]."); background-repeat: no-repeat; background-size: cover; background-position: center;'></div>
                                <div style='text-align: left; margin-left: 7px; margin-top: 15px;'>
                                    <h3>".$rowblog["title"]."</h3>
                                    <span>~by ".$rowblog["username"]."</span>
                                    <span style='color: gray; display: block'>".$rowblog["posted_at"]."</span>
                                </div>
                            </a>";
                    }
                } else {
                    echo "<i class='material-icons'>pool</i><br>Hmm... Can't find any blog :( <br><img id='bgcontacts' src='../img/hugo-co-workers.png'>";
                }
                echo "</div>";

                echo "</div>";

            } else {
                echo "<p>At least 3 characters!</p><img id='bgcontacts' src='../img/hugo-co-workers.png'>";
            }
        } else {
            echo "<img id='bgcontacts' src='../img/hugo-co-workers.png'>";
        }
        
        ?>

        <script>
            function psh() {
                document.getElementById("people").style.display = 'block';
                document.getElementById("blogs").style.display = 'none';
                document.getElementById("peoplebtn").style.borderBottom = '3px solid';
                document.getElementById("blogsbtn").style.borderBottom = 'none';
            }
            function bsh() {
                document.getElementById("people").style.display = 'none';
                document.getElementById("blogs").style.display = 'block';
                document.getElementById("blogsbtn").style.borderBottom = '3px solid';
                document.getElementById("peoplebtn").style.borderBottom = 'none';
            }
        </script>

    </div>

    <?php require_once('footer.php'); ?>