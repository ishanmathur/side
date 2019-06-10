<?php
require_once('../header.php');
$u = $_GET['id'];
$sql = "SELECT * FROM users WHERE id='" . $u . "'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$sqlblog = "SELECT * FROM posts WHERE username='" . $row["username"] . "'";
$resultblog = $conn->query($sqlblog);
?>
<link rel="stylesheet" href="../css/welcome.css">

<?php require_once('../navbar.php'); ?>

<div class="container">
    <div id="info"><br>
        <div style="background: url('<?php if ($row["pimgloc"] != '') {
                                            echo "../" . $row["pimgloc"];
                                        } else {
                                            echo "../img/nav/user.png";
                                        } ?>'); background-size: contain; background-repeat: no-repeat; background-position: center;" ; id="profilepic"></div>
        <h3>@<b><?php echo $row["username"]; ?></b></h3>
        <?php
        if ($row["bio"] != "") {
            echo '&nbsp; &nbsp; <b> Bio</b> :
                              <h5>' . $row["bio"] . '</h5>';
        }
        ?><br>
        <h3 style="color: black;"><b><?php echo $row["fullname"]; ?> </b></h3>


        <?php
        if ($row["city"] != "") {
            echo '<div class="details"><img src="../img/profiledetails/city.png" width="35" height="auto"> &nbsp; ' . $row["city"] . '</div>';
        }
        if ($row["phone"] != "") {
            echo '<div class="details"><img src="../img/profiledetails/phone.png" width="35" height="auto"> &nbsp; ' . $row["phone"] . '</div>';
        }
        if ($row["bday"] != "") {
            echo '<div class="details"><img src="../img/profiledetails/bday.png" width="35" height="auto"> &nbsp; ' . $row["bday"] . '</div>';
        }
        if ($row["created_at"] != "") {
            echo '<div class="details"><img src="../img/profiledetails/joined.png" width="35" height="auto"> &nbsp; ' . $row["created_at"] . '</div>';
        }
        ?>

    </div>

    <?php
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
        }
    ?>
    
</div>

<?php require_once('../footer.php'); ?>