<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'demo');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Define variables and initialize with empty values
$fullname = $username = $password = $confirm_password = "";
$fullname_err = $username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["fullname"]))){
        $username_err = "Please enter your Full Name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE fullname = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_fullname);
            
            // Set parameters
            $param_fullname = trim($_POST["fullname"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
            
                $fullname = trim($_POST["fullname"]);
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
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
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($fullname_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (fullname, username, password) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_fullname, $param_username, $param_password);
            
            // Set parameters
            $param_fullname = $fullname;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<?php require_once('../header.php'); ?>
<style>
    .form-control { border: none;  }
    @media only screen and (max-width: 700px) {
            .col form {
                min-width: 75vw;
            }
        }
</style>

<?php require_once('nav.php'); ?>

    <br><div class="alert-primary" align="center" style="margin: 20px; padding: 20px; border-radius: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3);">
        <h2 style="margin: 8px; padding: 8px; font-family: 'Work Sans', sans-serif;"> <img src="../img/user-min.png" width="50" height="auto"> Sign Up</h2>
        <p><b>Please fill this form to create an account.</b></p>
        <div class="row">
            <div class="col">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($fullname_err)) ? 'has-error' : ''; ?>">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="material-icons">face</i></span>
                            </div>
                            <input type="text" name="fullname" class="form-control" value="<?php echo $fullname; ?>" placeholder="Your Full Name" aria-label="Your Full Name" aria-describedby="basic-addon1">
                            <span class="help-block"><?php echo $fullname_err; ?></span>
                        </div>
                    </div>    
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="material-icons">person_outline</i></span>
                            </div>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                    </div>    
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="material-icons">lock_open</i></span>
                            </div>
                            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                    </div>
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="material-icons">lock</i></span>
                            </div>
                            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="basic-addon1">
                            <span class="help-block"><?php echo $confirm_password_err; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" style="border-radius: 50px; font-weight: bold;" class="btn btn-outline-primary" value="Submit">
                    </div>
                    <p>Already have an account?<br><a href="login.php"><b>Login here </b> <i style="vertical-align: middle;" class="material-icons">fast_forward</i></a>.</p>
                </form>
            </div>
            <div class="col">
                <img src='../img/sign-up.png' width="90%">
            </div>
        </div> 
    </div>  
    

    <?php require_once('../footer.php'); ?>