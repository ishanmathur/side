<?php
require_once('header.php');
$sql = "SELECT * FROM posts";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
?>

<link rel="stylesheet" type="text/css" href="slick/slick.css" />
<link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>

    <?php require_once('navbar.php'); ?>

    <div style="position: relative">
        <br><div id="ekishara"></div>
    </div>

    <div class="container" style="background: #e6e6e6; position: relative;">
        <br>
        <div id="about" data-aos="zoom-in" data-aos-mirror="true">
            <img class="hlogo" src="../img/nav/about.png">&nbsp;&nbsp;<span class="cardTitle">About</span><br><br>
            <h5>
                Ishara is a revolutionary venture to promote any form of art and speech in Ajmer and anywhere
                around. We thrive to bring an event dedicated truly to art, an environment where everyone can
                spend time amidst the visual and vocal melodies.
            </h5>
            <a class="btn" data-toggle="collapse" href="#collapseAbout" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="material-icons">keyboard_arrow_down</i></a>
            <div class="collapse" id="collapseAbout">
                <h5 class="card card-body" style="background: #00c6ff;">
                    It is a venture to free the current generation from
                    the "ancestral peer pressure" that suppressed the artists all through this while for a very long while.
                    We tend to create not just an awareness but a revolution. The beauty our town needs the art within
                    to thrive and prosper.
                </h5>
            </div>
        </div><br>

        <div id="mission" data-aos="zoom-in" data-aos-mirror="true">
            <img class="hlogo" src="../img/nav/mission.png">&nbsp;&nbsp;<span class="cardTitle">Mission</span><br><br>
            <h5>
                We at Ishara aim towards an awareness and bringing about a revolutionary change in the mindsets
                of our society and to create a community which will work towards the betterment of various art
                forms and literature making Ajmer the hub of it. The funds raised by our community will be used to
                estabilish an Art Mueseum with a School of Art and Literature in Ajmer to promote art forms and
                preserve it for the future generations. An addtion to that we are gravitated in organising campaigns
                regarding climate changes and its resolutions.
            </h5>
        </div><br>

        <div id="works" data-aos="zoom-in" data-aos-mirror="true">
            <img class="hlogo" src="../img/nav/works.png">&nbsp;&nbsp;<span class="cardTitle">Blogs</span><br><br>

            <?php
            echo '<div class="slidethrough">';
            $colorpallete = ['primary', 'dark', 'success', 'danger', 'warning'];
            $j = 0;
            // output data of each row
            while ($row = $result->fetch_assoc()) {

                echo '
                        <div class="card alert-' . $colorpallete[$j] . '" style="margin: 10px; padding: 10px; width: 220px; border-radius: 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                            <img src="' . $row["postloc"] . '" alt="..."  width="200px" height="auto">
                            <div class="card-body">
                            <p class="card-text">~by ' . $row["username"] . '</p>
                            <a href="' . $row["postloc"] . '" target="_BLANK">View</a>
                            </div>
                        </div>
                    ';
                if ($j + 1 >= sizeof($colorpallete)) {
                    $j = -1;
                }
                $j++;
            }
            echo "</div>";
            ?>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('.slidethrough').slick({
                        adaptiveHeight: true,
                        dots: true,
                        variableWidth: true,
                        centerMode: true,
                    });
                });
            </script>

        </div><br>

        <div id="event" data-aos="zoom-in" data-aos-mirror="true">
            <img class="hlogo" src="../img/nav/event.png">&nbsp;&nbsp;<span class="cardTitle">Event</span><br><br>

            <div class="row" style="margin: 5px; padding: 5px;">
                <div class="col" style="max-width: 70px;"> <img src="../img/event/calendar.png" width="45px" height="auto"> </div>
                <h5 class="col"> 15th and 16th June, 2019 </h5>
            </div>
            <div class="row" style="margin: 5px; padding: 5px;">
                <div class="col" style="max-width: 70px;"> <img src="../img/event/location.png" width="45px" height="auto"> </div>
                <h5 class="col"> Panchvati Garden, Mango Masala, Ajmer </h5>
            </div>
            <div class="row" style="margin: 5px; padding: 5px;">
                <div class="col" style="max-width: 70px;"> <img src="../img/event/revenue.png" width="45px" height="auto"> </div>
                <h5 class="col"> Art and Literature </h5>
            </div>

            <div align="center">
                <button id="d1btn" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#dayOne"><i class="material-icons">card_giftcard</i> &nbsp; <b> Day 1</b>
                    <h4>Art Exhibition</h4>
                </button>
                <button id="d2btn" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#dayTwo"><i class="material-icons">card_giftcard</i> &nbsp; <b> Day 2</b>
                    <h4>Poerty Slam</h4>
                </button>
            </div>

        </div><br>

        <div class="modal fade bd-example-modal-lg bd-example-modal-lg" id="dayOne" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header alert-danger">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Day 1</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body alert-warning" id="dayOneBody">

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade bd-example-modal-lg bd-example-modal-lg" id="dayTwo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header alert-danger">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Day 2</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body alert-danger" id="dayTwoBody">

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

        <div id="contact" data-aos="zoom-in" data-aos-mirror="true">
            <img class="hlogo" src="../img/nav/team.png">&nbsp;&nbsp;<span class="cardTitle">Team</span><br><br>
            <div id="showteam"></div>

            <script src="js/team.js"></script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('#showteam').slick({
                        adaptiveHeight: true,
                        dots: true,
                        variableWidth: true,
                    });
                });
            </script>
        </div>
    </div><br><br><br><br><br><br><br><br>

    </div>

    <div id="footer" style="text-align: center; position: fixed; bottom: 10px; z-index: -2; left: 50%; transform: translate(-50%, -50%);">
        <h5>
            Made with <span style="color: red;"> &#9825; </span> by Ishan Mathur
        </h5><br>
    </div>

    <script type="text/javascript" src="slick/slick.min.js"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <?php require_once('footer.php'); ?>