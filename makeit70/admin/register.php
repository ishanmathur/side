<?php
require_once('../config.php');
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $semester = $_POST["semester"];
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter your SID.";
    } else{
        $sql = "SELECT id FROM users_admin WHERE username = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        $sql = "INSERT INTO users_admin (username, password)";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            if(mysqli_stmt_execute($stmt)){
                header("location: index.php");
            } else{
                echo "Something went wrong. Please try again later. " . $conn->error;
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>

<?php require_once('header.php'); ?>
<style>
    .spanblock { display: block; }
    .colclass { margin: 10px; }
    @media only screen and (min-width: 600px) {
        .colclass { display: inline-block; }
        .wrapper { margin-left: 50px; }
    }
</style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <span class="spanblock">Username</span>
            <input required type="text" name="username" value="<?php echo $username; ?>">
            <span class="spanblock"><?php echo $username_err; ?></span>
            <span class="spanblock">Password</span>
            <input required type="password" name="password" value="<?php echo $password; ?>">
            <span class="spanblock"><?php echo $password_err; ?></span>
            <span class="spanblock">Confirm</span>
            <input required type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
            <span class="spanblock"><?php echo $confirm_password_err; ?></span>
            <div>
                <input type="submit" value="Submit" style="padding: 5px; margin: 5px; background: #007bff; color: #ffffff; border: 1px solid #000000; border-radius: 10px;">
                <input type="reset" value="Reset" style="padding: 5px; margin: 5px; background: #ffffff; color: #007bff; border: 1px solid #000000; border-radius: 10px;">
            </div>
            <p>Already have an account? <a href="/">Login here</a></p>
        </form>
    </div>    
</body>
</html>