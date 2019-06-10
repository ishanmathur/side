<?php
require_once('header.php');
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);
?>

<?php
$ip1 = $_SERVER['REMOTE_ADDR'];
$finalopen = "INSERT INTO dety (ipadd) VALUES ('$ip1')";
$conn->query($finalopen);
?>

<link rel="stylesheet" type="text/css" href="slick/slick.css" />
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body>

    <div id="loader">
        <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <script>
        document.onreadystatechange = function() {
            var state = document.readyState
            if (state == 'interactive') {
                document.getElementById('outer-box').style.display = "none";
            } else if (state == 'complete') {
                setTimeout(function() {
                    document.getElementById('interactive');
                    document.getElementById('loader').style.display = "none";
                    document.getElementById('outer-box').style.display = "block";
                }, 1000);
            }
        }
    </script>

    <div id="outer-box" style="display: none">

        <div id="ekishara">
            <div id="showoff">
                <form align="center" action="../q.php" method="get">
                    <input id="showoffbox" required name="search" type="search" placeholder="Search Ek Ishara....">
                    <button name="searchIshara" class="btn" type="submit" style="border-radius: 50px;"><i class="material-icons">search</i></button>
                </form>
            </div>
            <div id="upbg"></div>
            <div id="uptxt">
                <div>
                    <span id="together"><b>TOGETHER</b></span><br>
                    <span style="color: #b9b9b9;">Let's biuld a community for artists</span>
                </div>
                <div id="fifteen">
                    <span id="days"></span>
                    <span id="hours"></span>
                    <span id="minutes"></span>
                    <span id="seconds"></span>
                </div><br>
                <button id="scrolldown" class="btn" onclick="window.location.href='#toprow'"> <b>Experience</b> </button>
            </div>
            <!-- <div style="bottom: 0; position: absolute; left: 50%; transform: translate(-50%, -50%);">
                <p>Slide down...<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons">keyboard_arrow_down</i></p>
            </div> -->
            <script>
                // Set the date we're counting down to
                var countDownDate = new Date("Jun 15, 2019").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                    // Get today's date and time
                    var now = new Date().getTime();

                    // Find the distance between now and the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Output the result in an element with id="demo"
                    document.getElementById("days").innerHTML = days + "d";
                    document.getElementById("hours").innerHTML = hours + "h";
                    document.getElementById("minutes").innerHTML = minutes + "m";
                    document.getElementById("seconds").innerHTML = seconds + "s";

                    // If the count down is over, write some text 
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("demo").innerHTML = "GO-ON!!!";
                    }
                }, 100);
            </script>
        </div>

        <?php require_once('navbar.php'); ?>

        <div class="container-fluid" style="background-color: #ffffff; border-top-left-radius: 20px; border-top-right-radius: 20px;">
            <div class="container">
                <br><br>

                <div id="toprow" align="center">

                    <button id="aboutBtn" class="aone btn btn-outline-primary" data-toggle="collapse" href="#collapseAbout" role="button" aria-expanded="false" aria-controls="collapseExample" data-aos="fade-up" data-aos-delay="100">
                        <img src="../img/nav/about.png" height="45px" width="auto">
                        <h5><b>About</b></h5>
                    </button>

                    <div class="collapse" id="collapseAbout"><br>
                        <span class="cardTitle">About</span><br>
                        <div class="underline"></div><br>
                        <h5><b>
                                Ishara is a revolutionary venture to promote any form of art and speech in Ajmer and anywhere
                                around. We thrive to bring an event dedicated truly to art, an environment where everyone can
                                spend time amidst the visual and vocal melodies.
                                It is a venture to free the current generation from
                                the "ancestral peer pressure" that suppressed the artists all through this while for a very long while.
                                We tend to create not just an awareness but a revolution. The beauty our town needs the art within
                                to thrive and prosper.
                            </b></h5>
                    </div>

                    <button id="missionBtn" class="aone btn btn-outline-warning" data-toggle="collapse" href="#collapseMission" role="button" aria-expanded="false" aria-controls="collapseExample" data-aos="fade-up" data-aos-delay="200">
                        <img src="../img/nav/mission.png" height="45px" width="auto">
                        <h5><b>Mission</b></h5>
                    </button>

                    <div id="collapseMission" class="collapse"><br>
                        <span class="cardTitle">Mission</span><br>
                        <div class="underline"></div><br>
                        <h5><b>
                                We at Ishara aim towards an awareness and bringing about a revolutionary change in the mindsets
                                of our society and to create a community which will work towards the betterment of various art
                                forms and literature making Ajmer the hub of it. The funds raised by our community will be used to
                                estabilish an Art Mueseum with a School of Art and Literature in Ajmer to promote art forms and
                                preserve it for the future generations. An addtion to that we are gravitated in organising campaigns
                                regarding climate changes and its resolutions.
                            </b></h5>
                    </div>

                    <button id="contactBtn" class="aone btn btn-outline-danger" onclick="window.location.href='#contact'" data-aos="fade-up" data-aos-delay="300">
                        <img src="../img/nav/contact.png" height="45px" width="auto">
                        <h5><b>Contact</b></h5>
                    </button>

                    <button id="whyBtn" class="aone btn btn-outline-success" onclick="window.location.href='why.php'" data-aos="fade-up" data-aos-delay="400">
                        <img src="../img/nav/why.png" height="45px" width="auto">
                        <h5><b>Why us</b></h5>
                    </button>
                </div>



                <br>
                <div class="dropdown-divider"></div><br>

                <div id="works">
                    <div align="center">
                        <span class="cardTitle" data-aos="zoom-in" data-aos-delay="125">Blogs</span>
                        <div class="underline"></div><br>
                        <a class="btn btn-primary" href="../works/blogs.php">Explore All</a><br><br>
                    </div>
                    <?php
                    echo '<div class="container-fluid" data-aos="zoom-in" data-aos-delay="150"><div class="slidethrough">';
                    $j = 0;
                    $delay = 150;
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {

                        echo '
                                <div class="card" data-aos="flip-up" data-aos-delay="' . $delay . '" style="margin: 10px; width: 320px; border-radius: 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                                    <img src="' . $row["imgoneloc"] . '" alt="' . $row["paraone"] . '" width="300px" height="auto">
                                    <div class="card-body">
                                        <h3><b>' . $row["title"] . '</b></h3>
                                        <p class="card-text">~by ' . $row["username"] . '</p>
                                        <p class="card-text">' . $row["posted_at"] . '</p>
                                        <a href="../works/b.php?id=' . $row["id"] . '"><b>View</b></a>
                                    </div>
                                </div>
                            ';
                        if ($j == 6) {
                            break;
                        }
                        $j++;
                        $delay = $delay + 50;
                    }
                    echo "</div></div>";
                    ?>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('.slidethrough').slick({
                                adaptiveHeight: true,
                                variableWidth: true
                            });
                        });
                    </script>

                </div><br>

                <br>
                <div class="dropdown-divider"></div><br>

                <div id="event">
                    <div align="center">
                        <span class="cardTitle" data-aos="zoom-in" data-aos-delay="125">Event</span>
                        <div class="underline"></div><br><br>
                    </div>
                    <div class="row">
                        <div class="col" style="max-width: 500px; min-width: 270px;">
                            <div class="row" data-aos="zoom-in-up" data-aos-delay="150" style="margin: 5px; padding: 5px;">
                                <div class="col" style="max-width: 70px;"> <img src="../img/event/calendar.png" width="45px" height="auto"> </div>
                                <h5 class="col"> <b>15th and 16th June, 2019</b> </h5>
                            </div>
                            <div class="row" data-aos="zoom-in-up" data-aos-delay="175" style="margin: 5px; padding: 5px;">
                                <div class="col" style="max-width: 70px;"> <img src="../img/event/location.png" width="45px" height="auto"> </div>
                                <h5 class="col"> <b>Panchvati Garden, Mango Masala, Ajmer</b> </h5>
                            </div>
                            <div class="row" data-aos="zoom-in-up" data-aos-delay="200" style="margin: 5px; padding: 5px;">
                                <div class="col" style="max-width: 70px;"> <img src="../img/event/revenue.png" width="45px" height="auto"> </div>
                                <h5 class="col"> <b>Art and Literature</b> </h5>
                            </div>
                        </div>
                        <div class="col" data-aos="fade-up" data-aos-delay="150" style="min-width: 270px;">
                            <img src="../img/bg/event.svg">
                        </div>
                    </div>
                    <div align="center">
                        <button id="d1btn" type="button" class="btn" data-aos="flip-left" data-aos-delay="175" data-toggle="modal" data-target="#dayOne"><i class="material-icons">card_giftcard</i> &nbsp; <b> Day 1</b>
                            <h4>Art Exhibition</h4>
                        </button>
                        <button id="d2btn" type="button" class="btn" data-aos="flip-right" data-aos-delay="175" data-toggle="modal" data-target="#dayTwo"><i class="material-icons">card_giftcard</i> &nbsp; <b> Day 2</b>
                            <h4>Poerty Slam</h4>
                        </button>
                    </div>

                </div><br>

                <div class="modal fade bd-example-modal-lg bd-example-modal-lg" id="dayOne" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert-light">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Day 1</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body alert-light" id="dayOneBody">

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade bd-example-modal-lg bd-example-modal-lg" id="dayTwo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header alert-light">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Day 2</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body alert-light" id="dayTwoBody">

                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function() {
                        $("#d1btn").click(function() {
                            $("#dayOneBody").load("dayone.php");
                        });
                    });
                    $(document).ready(function() {
                        $("#d2btn").click(function() {
                            $("#dayTwoBody").load("daytwo.php");
                        });
                    });
                </script>

                <br>
                <div class="dropdown-divider"></div><br>

                <div id="team">
                    <div align="center">
                        <span class="cardTitle" data-aos="zoom-in" data-aos-delay="125">Team</span>
                        <div class="underline"></div><br><br>
                    </div>
                    <div id="showteam" class="container-fluid" data-aos="fade-up" data-aos-delay="175"></div>

                    <script src="js/team.js"></script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#showteam').slick({
                                adaptiveHeight: true,
                                variableWidth: true,
                            });
                        });
                    </script>
                </div>

                <br>
                <div class="dropdown-divider"></div><br>

                <div id="contact">
                    <div align="center">
                        <span class="cardTitle" data-aos="zoom-in" data-aos-delay="125">Contact</span>
                        <div class="underline"></div><br><br>
                    </div>
                    <br>
                    <div class="row" align="center">
                        <div class="col" data-aos="fade-up" data-aos-delay="150" style="min-width: 270px;">
                            <img src="../img/bg/host.svg">
                        </div>
                        <div class="col" data-aos="fade-up" data-aos-delay="175" style="max-width: 500px; min-width: 270px;">
                            <form action="ask.php" method="post">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Name:</span>
                                    </div>
                                    <input maxlength="45" name="yourname" type="text" class="form-control" placeholder="Your Name" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">No. / email</span>
                                    </div>
                                    <input maxlength="45" name="yournumberemail" type="text" class="form-control" placeholder="Your Number or email" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Suggest</span>
                                    </div>
                                    <textarea maxlength="140" name="yoursuggest" rows="5" class="form-control" aria-label="With textarea" required>Your suggestions...</textarea>
                                </div><br>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <br>
                </div><br><br><br>

            </div>
        </div>

        <!-- <div id="footer" style="text-align: center; position: fixed; bottom: 7px; z-index: -2; left: 50%; transform: translate(-50%, -50%);">
            <h5>
                Made with <span style="color: red;"> &#9825; </span> by Ishan Mathur
            </h5><br>
        </div> -->

        <script type="text/javascript" src="slick/slick.min.js"></script>

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

    </div>

    <?php require_once('footer.php'); ?>