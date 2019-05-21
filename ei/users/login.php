<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ekdb');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
    @media only screen and (max-width: 700px) {
        .col form {
            min-width: 75vw;
        }
    }
</style>

    <?php require_once('nav.php'); ?>

    <br><div class="alert-primary" align="center" style="margin: 20px; padding: 20px; border-radius: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3);">
        <h2 style="margin: 8px; padding: 8px; font-family: 'Work Sans', sans-serif;"> <img src="../img/user-min.png" width="50" height="auto"> Log In</h2><br>
        <p><b>Login to your account</b></p>
        <div class="row">
            <div class="col">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" style="border-radius: 50px; font-weight: bold;" class="btn btn-outline-primary" value="Login">
                    </div>
                    <p>Don't have an account?<br><a href="register.php"><b>Sign up now </b><i style="vertical-align: middle;" class="material-icons">fast_forward</i></a>.</p>
                </form>
            </div>
            <div class="col">
                <img src='../img/bg/sign-in.png' width="90%">
            </div>
        </div> 
    </div>   

    <?php require_once('../footer.php'); ?>