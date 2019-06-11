<?php require_once('requires/header.php'); ?>
<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: users/welcome.php");
    exit;
}
?>
</head>

<body>

    <div class="container">
        <p>
            <a href="users/login.php" class="btn btn-warning">Log In</a>
            <a href="users/register.php" class="btn btn-danger">Register</a>
        </p>
    </div>

    <?php require_once('requires/footer.php'); ?>