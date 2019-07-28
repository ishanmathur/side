<?php
require_once('config.php');
$fullname = $ladd = $padd = $phone = $pphone = $emailid = $tenth = $twelveth = $semester = $enrollno = $username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $semester = $_POST["semester"];
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter your SID.";
    } else{
        $sql = "SELECT id FROM $semester WHERE username = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This SID is already taken.";
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
        $fullname = $_POST["fullname"];
        $ladd = $_POST["ladd"];
        $padd = $_POST["padd"];
        $phone = $_POST["phone"];
        $pphone = $_POST["pphone"];
        $emailid = $_POST["emailid"];
        $tenth = $_POST["tenth"];
        $twelveth = $_POST["twelveth"];
        $enrollno = $_POST["enrollno"];
        $sql = "INSERT INTO $semester (username, password, fullname, ladd, padd, phone, pphone, emailid, tenth, twelveth, semester, enrollno) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssssssssss", $param_username, $param_password, $param_fullname, $param_ladd, $param_padd, $param_phone, $param_pphone, $param_emailid, $param_tenth, $param_twelveth, $param_semester, $param_enrollno);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_fullname = $fullname;
            $param_ladd = $ladd;
            $param_padd = $padd;
            $param_phone = $phone;
            $param_pphone = $pphone;
            $param_emailid = $emailid;
            $param_tenth = $tenth;
            $param_twelveth = $twelveth;
            $param_semester = $semester;
            $param_enrollno = $enrollno;
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
            <div>
                <div class="colclass">
                    <span class="spanblock">Full Name</span>
                    <input required type="text" name="fullname" value="<?php echo $fullname; ?>">
                </div>
                <div class="colclass">
                    <span class="spanblock">SID</span>
                    <input required type="text" pattern="[0-9]{5}" name="username" value="<?php echo $username; ?>">
                    <span class="spanblock"><?php echo $username_err; ?></span>
                </div>
            </div>

            <div>
                <div class="colclass">
                    <span class="spanblock">Enrollment No.: </span>
                    <input required type="text" name="enrollno" value="<?php echo $enrollno; ?>">
                </div>
                <div class="colclass">
                    <span class="spanblock">Semester: </span>
                    <select name="semester">
                        <option value="users_third">III (Third)</option>
                        <option value="users_fifth">V (fifth)</option>
                        <option value="users_seventh">VII (seventh)</option>
                    </select>
                </div>
            </div>

            <div>
                <div class="colclass">
                    <span class="spanblock">Your Phone: </span>
                    <input required type="text" pattern="[0-9]{10}" name="phone" value="<?php echo $phone; ?>">
                </div>
                <div class="colclass">
                    <span class="spanblock">Parents Phone: </span>
                    <input required type="text" pattern="[0-9]{10}" name="pphone" value="<?php echo $pphone; ?>">
                </div>
                <div class="colclass">
                    <span class="spanblock">Email id: </span>
                    <input required type="email" name="emailid" value="<?php echo $emailid; ?>">
                </div>
            </div>

            <div>
                <div class="colclass">
                    <span class="spanblock">10th Marks: </span>
                    <input required type="text" name="tenth" value="<?php echo $tenth; ?>">
                </div>
                <div class="colclass">
                    <span class="spanblock">12th Marks: </span>
                    <input required type="text" name="twelveth" value="<?php echo $twelveth; ?>">
                </div>
            </div>

            <div>
                <div class="colclass">
                    <span class="spanblock">Local Adderss: </span>
                    <textarea rows="3" cols="30" required name="ladd"><?php echo $ladd; ?></textarea>
                </div>
                <div class="colclass">
                    <span class="spanblock">Permanent Adderss: </span>
                    <textarea rows="3" cols="30" required name="padd"><?php echo $padd; ?></textarea>
                </div>
            </div>
            
            <div>
                <div class="colclass">
                    <span class="spanblock">Password</span>
                    <input required type="password" name="password" value="<?php echo $password; ?>">
                    <span class="spanblock"><?php echo $password_err; ?></span>
                </div>
                <div class="colclass">
                    <span class="spanblock">Confirm</span>
                    <input required type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
                    <span class="spanblock"><?php echo $confirm_password_err; ?></span>
                </div>
            </div>

            <div>
                <input type="submit" value="Submit" style="padding: 5px; margin: 5px; background: #007bff; color: #ffffff; border: 1px solid #000000; border-radius: 10px;">
                <input type="reset" value="Reset" style="padding: 5px; margin: 5px; background: #ffffff; color: #007bff; border: 1px solid #000000; border-radius: 10px;">
            </div>
            <p>Already have an account? <a href="/">Login here</a></p>
        </form>
    </div>    
</body>
</html>