<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
require_once "config.php";
$username = $password = "";
$username_err = $password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    $semester = $_POST["semester"];
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM $semester WHERE username = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["semester"] = $semester;
                            header("location: welcome.php");
                        } else{
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    $username_err = "No account found with that username.";
                }
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
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>SID</label>
                <input type="text" name="username" value="<?php echo $username; ?>">
                <p style="color:red"><?php echo $username_err; ?></p>
            </div><br/>
            <div>
                <select name="semester">
                    <option value="users_third">III (Third)</option>
                    <option value="users_fifth">V (fifth)</option>
                    <option value="users_seventh">VII (seventh)</option>
                </select>
            </div><br/>
            <div class="<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password">
                <p style="color:red"><?php echo $password_err; ?></p>
            </div><br/>
            <input type="submit" class="btn btn-primary" value="Login">
        </form>
    </div>    
</body>
</html>