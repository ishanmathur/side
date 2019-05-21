<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../users/login.php");
    exit;
}
?>

<?php require_once('../header.php'); ?>

<style>
    #paraone,
    #paratwo {
        width: 80%;
        height: 200px;
    }

    #postbtn {
        width: 100%;
        padding: 12px;
        bottom: 0;
        position: fixed;
    }

    .material-icons {
        vertical-align: middle;
    }
</style>

</head>

<body>

    <?php require_once('../navbar.php'); ?>

    <br>
    <div class="container">
        <h2><img src="../img/nav/works.png" width="50px" /> <b>New blogpost...</b></h2>
        <a style="color: red;" href="welcome.php"><i class="material-icons">keyboard_arrow_left</i> Cancel</a>
        <div class="dropdown-divider"></div><br>
    </div>

    <br><br>
    <form action="getwork.php" method="post">

        <div class="container">

            <div id="imgonedisbox" style="width: auto; height: auto;">
                <h4>Add a header image... </h4>
                <span style="display: block; font-size: 15px;">Try to use a lanscape picture!</span>
                <img id="imgonedis" src="" height="200px" width="auto" />
            </div>
            <input type="file" name="imgone" id="imgone" onchange="loadFileOne(event)"><br><br>

            <script>
                var loadFileOne = function(event) {
                    var output = document.getElementById('imgonedis');
                    output.src = URL.createObjectURL(event.target.files[0]);
                };
            </script>


            <h3>Blog Title...</h3>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="material-icons">label</i></span>
                </div>
                <input type="text" name="title" class="form-control" placeholder="Title" aria-label="Title" aria-describedby="basic-addon1">
            </div><br>

            <div class="input-group">
                <textarea maxlength="240" id="paraone" name="paraone" class="form-control" aria-label="With textarea" placeholder="Write somethinig..."></textarea>
            </div><br>

            <div id="imgtwodisbox" style="width: auto; height: auto;">
                <h4>You can add one more image!</h4>
                <img id="imgtwodis" src="" height="200px" width="auto" />
            </div>
            <input type="file" name="imgtwo" id="imgtwo" onchange="loadFileTwo(event)"><br><br>

            <script>
                var loadFileTwo = function(event) {
                    var output = document.getElementById('imgtwodis');
                    output.src = URL.createObjectURL(event.target.files[0]);
                };
            </script>

            <div class="input-group">
                <textarea maxlength="240" id="paratwo" name="paratwo" class="form-control" aria-label="With textarea" placeholder="Continue writing..."></textarea>
            </div><br>

        </div><br><br><br><br><br>

        <button id="postbtn" type="submit" name="postbtn" class="btn-primary"><i class="material-icons">done_all</i><b> Post</b></button>

    </form>


    <?php require_once('../footer.php'); ?>