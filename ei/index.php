<?php
  require_once('header.php');
  $sql = "SELECT * FROM posts";
  $result = $conn->query($sql);
  $row = mysqli_fetch_array($result);
?>
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
        <link rel="stylesheet" type="text/css" href="css/main.css"/>
    </head>
    <body>
        <div id="ekishara">
            <div id="textheader">
                <div id="one">Ek Ishara</div>
                <div id="two">Art & Culture Museum<br>coming soon in Ajmer...</div>
            </div>
        </div>
        <nav align="center" class="sticky-top">
            <a class="btn btn-outline-primary" href="#ekishara"><i class="material-icons">home</i> Home</a> &nbsp;
            <a class="btn btn-outline-primary" href="users/login.php">Login &nbsp; <i class="material-icons">polymer</i></a>
        </nav>
        <div class="container" style="background: #E6E6E6">
            <br><div id="about">
                <span>&nbsp;About</span><br>
                <div class="row">
                    <div class="col" style="margin: 10px; padding: 10px;">
                        <h4 id="aboutdes">A museum (/mjuːˈziːəm/ mew-ZEE-əm; plural museums or, rarely, musea) is an institution that cares for (conserves) a collection of artifacts and other objects of artistic, cultural, historical, or scientific importance.
                        </h4>
                    </div>
                    <div class="col">
                        <img id="aboutpic" src="img/workshop.png" width="100%">
                    </div>
                </div>
            </div><br>
            <div id="works">
              <span>&nbsp;Works</span><br><br>
              
              <?php
                if ($result->num_rows > 0) {
                  echo '<div class="slidethrough">';
                  $colorpallete = ['primary', 'dark', 'success', 'danger', 'warning'];
                  $j = 0;
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                      
                    echo '
                      <div class="card alert-'.$colorpallete[$j].'" style="margin: 10px; padding: 10px; width: 220px; border-radius: 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                          <img src="'.$row["postloc"].'" alt="..."  width="200px" height="auto">
                          <div class="card-body">
                            <p class="card-text">~by '.$row["username"].'</p>
                            <a href="'.$row["postloc"].'" target="_BLANK">View</a>
                          </div>
                      </div>
                    ';
                    if($j + 1 >= sizeof($colorpallete)) { $j = -1; }
                    $j++;
                  }
                  echo "</div>";
                } 
                  else {
                  echo "<h2><b>No Works Yet!</b></h2>";
                }
              ?>
            </div><br>

            <script type="text/javascript">
                $(document).ready(function(){
                  $('.slidethrough').slick({
                    adaptiveHeight: true,
                    dots: true,
                    variableWidth: true,
                    centerMode: true,
                    
                  });
                });
            </script>
            <div id="contact">
                <span>&nbsp;Contact</span><br>
                <div style="padding: 10px; margin: 10px;">
                    <h4>
                        Visionary: Daksh Tak<br>
                        Location: Ajmer<br>
                        Phone: <br>
                </div>    
            </div>
        </div><br><br><br><br><br><br><br><br>
        <div id="footer" style="text-align: center; position: fixed; bottom: 10px; z-index: -2; left: 50%; transform: translate(-50%, -50%);">
            <h5>
                Made with <span style="color: red;"> &#9825; </span> by Ishan Mathur
            </h5><br>
        </div>
        <script type="text/javascript" src="slick/slick.min.js"></script>
       
    <?php require_once('footer.php'); ?>