<?php
if(!isset($_COOKIE["loggedin"])){
    header("location: index.php");
    exit;
}
require_once('config.php');
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    if(empty($new_password_err) && empty($confirm_password_err)){
        $sql = "UPDATE ".$_COOKIE["semester"]." SET password = ? WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_COOKIE["id"];
            if(mysqli_stmt_execute($stmt)){
                setcookie("loggedin", "", time() - 3600);
                setcookie("id", "", time() - 3600);
                setcookie("username", "", time() - 3600);
                setcookie("semester", "", time() - 3600);
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>
 
<?php require_once('header.php'); ?>
</head>
<body>
    <div class="wrapper" align="center">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="<?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="new_password" value="<?php echo $new_password; ?>">
                <span><?php echo $new_password_err; ?></span>
            </div><br/>
            <div class="<?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password">
                <span><?php echo $confirm_password_err; ?></span>
            </div><br/>
            <div>
                <input type="submit" value="Submit">
                <a href="welcome.php">Cancel</a>
            </div>
        </form>
    </div>    
</body>
</html>