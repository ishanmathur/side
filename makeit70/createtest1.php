<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /");
    exit;
}
require_once('header.php');
$u = htmlspecialchars($_SESSION["username"]);
$finalName = $_SESSION["testname"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    for($i = 1; $i <= 15; $i++){
        if(isset($_POST["q$i"])){
            $ques = $_POST["q$i"];
            $opt1 = $_POST["q".$i."1"];
            $opt2 = $_POST["q".$i."2"];
            $opt3 = $_POST["q".$i."3"];
            $opt4 = $_POST["q".$i."4"];
            $sqlQues = "INSERT INTO $finalName (ques, opt1, opt2, opt3, opt4)
                VALUES ('$ques', '$opt1', '$opt2', '$opt3', '$opt4')";
            if ($conn->query($sqlQues) === TRUE) {
                echo "OK";
            } else {
                echo "Error creating table: " . $conn->error;
            }
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
                    '<b>Option 4</b> &nbsp; <input required maxlength="200" name="q'+i+'4"><br/>';
                document.getElementById("main_q").appendChild(qdiv);
            }
            else {
                alert("Maximum 15 questions");
            }
        }

    </script>
</body>
</html>