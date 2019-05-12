<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ek Ishara</title>
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Lora:700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
        <style>
            body {
                font-family: 'Lora', serif; background: #E6E6E6;
            }
            #ekishara {
                text-align: center;
                background: #00c6ff;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #0072ff, #00c6ff);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #0072ff, #00c6ff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                width: 100vw;
                height: 60vh;
            }
            #textheader {
                position: absolute;
                top: 30%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
            #textheader #one {
                font-size: 11vw;
                font-weight: bold;
                color: white;
            }
            #textheader #two {
                font-size: 1.2rem;
            }
            nav {
                background: #00c6ff;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #0072ff, #00c6ff);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #0072ff, #00c6ff); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                padding: 5px;
            }
            nav .btn {
                background: #FFFFFF;
                margin: 5px;
                padding: 7px;
                width: 100px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                border-radius: 20px;
            }
            i { vertical-align: middle; }
            #about, #works, #contact { background: #FFFFFF; padding: 20px; border-radius: 20px; box-shadow: 0 8px 8px rgba(0, 0, 0, 0.2); }
            #about span, #works span, #contact span { 
                background: linear-gradient(to right, #0072ff, #00c6ff);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                font-size: 60px; 
                font-weight: bold; 
            }
            @media only screen and (max-width: 700px) {
                #aboutdes {
                    width: 75vw;
                }
            }
            #works .card { padding: 10px; margin: 10px; }
        </style>
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
            <a class="btn btn-outline-primary" href="login.php">Login &nbsp; <i class="material-icons">polymer</i></a>
        </nav>
        <div class="container" style="background: #E6E6E6">
            <br><div id="about">
                <br><span>&nbsp;&nbsp;About</span><br>
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
                <br><span>&nbsp;&nbsp;Works</span><br>
                <div class="slidethrough">
                    <div class="card">
                      <img src="https://cdn130.picsart.com/292775139050201.jpg?c256x256" class="card-img-top" alt="..." height="200px" width="auto">
                      <div class="card-body">
                        <p class="card-text">~by Ishan Mathur</p>
                        <a href="#" class="btn btn-primary">Like</a>
                      </div>
                    </div>
                    <div class="card">
                      <img src="https://cdn130.picsart.com/295252056030201.jpg?c256x256" class="card-img-top" alt="..." height="200px" width="auto">
                      <div class="card-body">
                        <p class="card-text">~by ABC</p>
                        <a href="#" class="btn btn-primary">Like</a>
                      </div>
                    </div>
                    <div class="card">
                      <img src="https://cdn140.picsart.com/293466597059201.jpg?c256x256" class="card-img-top" alt="..." height="200px" width="auto">
                      <div class="card-body">
                        <p class="card-text">~by DEF</p>
                        <a href="#" class="btn btn-primary">Like</a>
                      </div>
                    </div>
                    <div class="card">
                      <img src="https://static-s.aa-cdn.net/img/gp/20600000726210/1rnE87VhpWjrEoCailwW3kl4Z81z6SXtI0W-4459nAIrpMeagv0RipClr1ru9c4yMQ=w300?v=1" class="card-img-top" alt="..." height="200px" width="auto">
                      <div class="card-body">
                        <p class="card-text">~by GHI</p>
                        <a href="#" class="btn btn-primary">Like</a>
                      </div>
                    </div>
                    <div class="card">
                      <img src="https://cdn140.picsart.com/292753508021201.jpg?c256x256" class="card-img-top" alt="..." height="200px" width="auto">
                      <div class="card-body">
                        <p class="card-text">~by JKL</p>
                        <a href="#" class="btn btn-primary">Like</a>
                      </div>
                    </div>
                </div>
            </div><br>
            <script type="text/javascript">
                $(document).ready(function(){
                  $('.slidethrough').slick({
                    adaptiveHeight: true,
                    autoplay: true,
                    slidesToScroll: 1,
                    dots: true,
                    focusOnSelect: true,
                    variableWidth: true,
                    centerMode: true
                  });
                });
            </script>
            <div id="contact">
                <br><span>&nbsp;&nbsp;Contact</span><br>
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
                Made with <span style="color: red;"> &#9825;</span> by Ishan Mathur
            </h5><br>
        </div>
        <script type="text/javascript" src="slick/slick.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>