<?php
$which = $_SERVER['REQUEST_URI'];
if ($which == '/works/b.php') {
    header("location: ../works/blogs.php");
}
require_once('../header.php');
$u = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id='" . $u . "'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$sqlbot = "SELECT fullname, pimgloc FROM users WHERE username='" . $row['username'] . "'";
$resultbot = $conn->query($sqlbot);
$rowbot = mysqli_fetch_array($resultbot);
?>
<style>
    .b1 {
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
</style>
</head>

<body>

    <?php require_once('../navbar.php'); ?>

    <div class="container"><br>
        <?php if ($row["imgoneloc"] != '') {
            echo '<div class="b1" style="width: 100%; height: 50vh; background: url(' . $row["imgoneloc"] . ');
                                                                         background-repeat: no-repeat; background-size: cover; background-position: center;"></div><br><br>';
        } ?>
        <div id="mtitle">
            <h1><b> <?php echo $row["title"]; ?> </b></h1>
        </div><br>
        <div id="pone">
            <h5> <?php echo $row["paraone"]; ?> </h5>
        </div><br>
        <?php if ($row["imgtwoloc"] != '') {
            echo '<div class="b1" style="width: 100%; height: 50vh; background: url(' . $row["imgtwoloc"] . ');
                                                                         background-repeat: no-repeat; background-size: cover; background-position: center;"></div><br><br>';
        } ?>
        <div id="ptwo">
            <h5> <?php echo $row["paratwo"]; ?> </h5>
        </div><br><br>

        <div class="row">
            <div class="col" style="max-width: 60px;">
                <img src="<?php echo $rowbot["pimgloc"]; ?>" width="55px" height="auto" />
            </div>
            <div class="col">
                <h5 style="color: #595959;"> <b> &nbsp; ~by <?php echo $rowbot["fullname"] ?> </h5>
                <h6 style="color: #595959;"> <b> &nbsp; &nbsp; on: (<?php echo $row["posted_at"] ?>) </h6>
            </div>
            <br><br><br><br><br><br>
        </div>

        <?php require_once('../footer.php'); ?>