<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
require_once('../config.php');
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<?php require_once('../header.php'); ?>

    <?php require_once('nav.php'); ?>

    <br><br><div class="alert-primary" align="center" style="max-width: 400px; margin: 20px; padding: 20px; border-radius: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3);">
        <br><h2 style="margin: 8px; padding: 8px; font-family: 'Work Sans', sans-serif;"> <img src="../img/user-min.png" width="50" height="auto"> Reset Password</h2><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="material-icons">lock_open</i></span>
                    </div>
                    <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>" placeholder="New Password" aria-label="New Password" aria-describedby="basic-addon1">
                    <span class="help-block"><?php echo $new_password_err; ?></span>
                </div>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="material-icons">lock</i></span>
                    </div>
                    <input type="password" name="confirm_password" class="form-control"  placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="basic-addon1">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" style="border-radius: 50px; font-weight: bold;" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="welcome.php"><b>Cancel</b></a>
            </div>
        </form>
    </div>

    <?php require_once('../footer.php'); ?>