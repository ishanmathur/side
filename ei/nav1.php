<link rel="stylesheet" href="css/nav.css">
<nav id="navOpt">

    <span style="font-size:30px;cursor:pointer" onclick="openNav()">
        <i class="material-icons">menu</i> <b id="menuWritten" style="font-size: 18px">Menu</b>
    </span>

    <div class="dropdown">
        <button id="registerBtn" class="btn dropdown-toggle" type="button" id="dropdownUserButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="../img/nav/user.png" height="38px" width="auto">
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownUserButton">
            <a class="dropdown-item" href="users/login.php">
                <i class="material-icons">account_circle</i> <span>Login in Website</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="https://docs.google.com/forms/d/e/1FAIpQLSeKOyfSXI8GwnT2qpptqLUJnhrEjzXfqTa7O5EQEIV1uezh-g/viewform">
                <i class="material-icons">open_in_new</i> <span>Register for Event</span>
            </a>
        </div>
    </div>

</nav>

<div id="sideNav">

    <a href="javascript:void(0)" class="btn" id="closebtn" onclick="closeNav()">&times;</a>
        
    <div id="navCon">
        <br><br><br>
        <a class="nav-link" href="#ekishara" onclick="closeNav()"><img class="navimg" src="../img/nav/home.png"> &nbsp; <span class="navWord"> Home </span> </a> <br>
        
        <a class="nav-link" href="blogs.php" onclick="closeNav()"><img class="navimg" src="../img/nav/works.png"> &nbsp; <span class="navWord"> Blogs </span> </a> <br>
        
        <a class="nav-link" href="#event" onclick="closeNav()"><img class="navimg" src="../img/nav/event.png"> &nbsp; <span class="navWord"> Event </span> </a> <br>
        
        <a class="nav-link" href="/users/login.php"><img class="navimg" src="../img/nav/user.png"> &nbsp; <span class="navWord"> Profile </span> </a> <br>
        
        <a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSeKOyfSXI8GwnT2qpptqLUJnhrEjzXfqTa7O5EQEIV1uezh-g/viewform" target="_BLANK"><img class="navimg" src="../img/nav/register.png"> &nbsp; <span class="navWord"> Register </span> </a> <br>
    
    </div>
</div>

<script>
    function openNav() {
        document.getElementById("sideNav").style.width = "100%";
    }

        function closeNav() {
        document.getElementById("sideNav").style.width = "0";
    }
</script>