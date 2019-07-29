<?php
if(!isset($_COOKIE["loggedinasadmin"])){
    header("location: index.php");
    exit;
}
require_once('header.php');
$u = htmlspecialchars($_COOKIE["username"]);
$finalName = $_COOKIE["testname"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    for($i = 1; $i <= 15; $i++){
        if(isset($_POST["q$i"])){
            $ques = $_POST["q$i"];
            $opt1 = $_POST["q".$i."1"];
            $opt2 = $_POST["q".$i."2"];
            $opt3 = $_POST["q".$i."3"];
            $opt4 = $_POST["q".$i."4"];
            $correctans = $_POST["correctans$i"];
            $sqlQues = "INSERT INTO $finalName (ques, opt1, opt2, opt3, opt4, correctans)
                VALUES (?, ?, ?, ?, ?, ?)";
            if($stmt = mysqli_prepare($conn, $sqlQues)){
                mysqli_stmt_bind_param($stmt, "ssssss", $param_ques, $param_opt1, $param_opt2, $param_opt3, $param_opt4, $param_correctans);
                $param_ques = $ques;
                $param_opt1 = $opt1;
                $param_opt2 = $opt2;
                $param_opt3 = $opt3;
                $param_opt4 = $opt4;
                $param_correctans = $correctans;
                if(mysqli_stmt_execute($stmt)){
                    header("location: index.php");
                } else{
                    echo "Something went wrong. Please try again later. " . $conn->error;
                }
            }
            mysqli_stmt_close($stmt);
        }
        else { break; }
    }
}
?>
<style>
    #main_q div {
        margin-bottom: 50px;
    }
</style>
</head>
<body>
    <h3>Test Name: <b><?php echo $finalName; ?></b><br/>Type qusetion statement and then provide four options for each questions</h3>
    <form method="post">
        <div id="main_q">
            <div id="q1div">
                <b>Question 1.</b><br/>
                <textarea required maxlength="1250" name="q1" rows="4" cols="50"></textarea><br/>
                <b>Option 1</b> &nbsp; <input required maxlength="200" name="q11"><br/>
                <b>Option 2</b> &nbsp; <input required maxlength="200" name="q12"><br/>
                <b>Option 3</b> &nbsp; <input required maxlength="200" name="q13"><br/>
                <b>Option 4</b> &nbsp; <input required maxlength="200" name="q14"><br/>
                <p>Which option is correct?</p>
                <select name="correctans1">
                    <option value="opt1">1</option>
                    <option value="opt2">2</option>
                    <option value="opt3">3</option>
                    <option value="opt4">4</option>
                </select>
            </div>
        </div>
        <br/><button type="button" onclick="addques()">Add question</button><br/>
        <div align="center"><br/>
            <button type="submit" style="width: 50vw"><b>Create Test by <?php echo $u; ?></b></button>
        </div>
    </form>
    <script>
        var i = 1;
        function addques() {
            i++;
            if(i <= 15) {
                var qdiv = document.createElement("DIV");
                qdiv.id = "q"+i+"div";
                qdiv.innerHTML = '<b>Question '+i+'.</b><br/>' +
                    '<textarea required maxlength="1250" name="q'+i+'" rows="4" cols="50"></textarea><br/>' +
                    '<b>Option 1</b> &nbsp; <input required maxlength="200" name="q'+i+'1"><br/>' +
                    '<b>Option 2</b> &nbsp; <input required maxlength="200" name="q'+i+'2"><br/>' +
                    '<b>Option 3</b> &nbsp; <input required maxlength="200" name="q'+i+'3"><br/>' +
                    '<b>Option 4</b> &nbsp; <input required maxlength="200" name="q'+i+'4"><br/>' +
                    '<p>Which option is correct?</p>' +
                    '<select name="correctans'+i+'">' +
                        '<option value="opt1">1</option>' +
                        '<option value="opt2">2</option>' +
                        '<option value="opt3">3</option>' +
                        '<option value="opt4">4</option>' +
                    '</select>';
                document.getElementById("main_q").appendChild(qdiv);
            }
            else {
                alert("Maximum 15 questions");
            }
        }

    </script>
</body>
</html>