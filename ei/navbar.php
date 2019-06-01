<?php
$which = $_SERVER['REQUEST_URI'];
if($which == '/' || $which == '/index.php') {
    $forabout = '#toprow';
    $formission = '#toprow';
    $forteam = '#team';
    $forcontact = '#contact';
    $forevent = '#event';
}
else {
    $forabout = '../index.php#toprow';
    $formission = '../index.php#toprow';
    $forteam = '../index.php#team';
    $forcontact = '../index.php#contact';
    $forevent = '../index.php#event';
}
?>
<link rel="stylesheet" href="../css/nav.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <button class="navbar-toggler" style="border: none;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="material-icons">menu</i>
    </button>
    <a href="#ekishara">
        <img src="../img/bg/logoishara.png" width="auto" height="27" alt="Ek Ishara!">
    </a>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <br>
        <ul class="navbar-nav mr-auto mx-auto">
            &nbsp; &nbsp;
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span> Home </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                    <a class="dropdown-item" href="<?php echo $forabout ?>"><span> About </span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo $formission ?>"><span> Mission </span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo $forteam ?>"><span> Team </span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo $forcontact ?>"><span> Contact </span></a>
                </div>
            </li> &nbsp;
            <li class="nav-item">
                <a class="nav-link" href="../works/blogs.php"><span> Blogs </span></a>
            </li> &nbsp;
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $forevent ?>"><span> Event </span></a>
            </li> &nbsp;
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span> User </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                    <a class="dropdown-item" href="../users/login.php"> <span> Profile </span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" target="_BLANK" href="https://docs.google.com/forms/d/e/1FAIpQLSeKOyfSXI8GwnT2qpptqLUJnhrEjzXfqTa7O5EQEIV1uezh-g/viewform"><span> Register <span style="display: block; font-size: 10px; color: red;"> For June Event</span> </span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../why.php"><span> Why us? </span></a>
                </div>
            </li> &nbsp; &nbsp;
        </ul>
    </div>
    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
        <i class="material-icons">search</i>
    </button>
</nav>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: rgba(0, 0, 0, 0.6); border: none;">
            <div class="modal-body">
                <div align="right">
                    <button type="button" data-dismiss="modal" class="btn" style="color: white; font-size: 12px;"><i class="material-icons">clear</i> Cancel</button>
                </div><br>
                <form align="center" action="../q.php" method="get">
                    <input required id="searchInput" name="search" type="search" placeholder="Search Ek Ishara....">
                    <button name="searchIshara" class="btn btn-outline-primary" type="submit" style="border-radius: 50px;"><i class="material-icons">search</i> Search</button>
                </form>
            </div>
        </div>
    </div>
</div>