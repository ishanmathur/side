<style>
    #menu { position: fixed; width: 100%; z-index: 9999; }
    .nav-link { color: gray }
    @media only screen and (min-width: 600px) {
        ul { max-width: 400px; padding-top: 5px; }
        #menu { top: 0; box-shadow: 0 1px 10px #a6a6a6; }
        /*.navWritten { font-size: 15px; }*/
        .navImg { width: 25px; }
        .activehai { border-bottom: 3px solid; color: #007bff; }
    }
    @media only screen and (max-width: 599px) {
        #menu { box-shadow: 0 -1px 10px #a6a6a6; bottom: 0; }
        /*.navWritten { display: block; font-size: 2vw; }*/
        /*.forNav { font-size: 6vw; }*/
        .navImg { width: 5vw; }
        .activehai { border-top: 3px solid; color: #007bff; }
    }
    @media only screen and (max-width: 450px) {
        /*.navWritten { display: none; font-size: 3vw; }*/
        /*.forNav { font-size: 8vw; }*/
        .navImg { width: 7vw; }
    }
</style>
<nav id="menu" class="navbar-light bg-light">
    <div align="center">
        <ul class="nav nav-fill">
            <li class="nav-item">
                <a class="nav-link" id="navHome" href="../">
                    <!--<i class="material-icons-outlined forNav">home</i> <b class="navWritten">Home</b>-->
                    <img src="../img/nav/home.png" alt="H" class="navImg">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="navSearch" href="q.php">
                    <!--<i class="material-icons-outlined forNav">search</i> <b class="navWritten">Search</b>-->
                    <img src="../img/nav/search.png" alt="S" class="navImg">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="navNotif" href="../notif">
                    <!--<i class="material-icons-outlined forNav">notifications_active</i> <b class="navWritten">Notif's</b>-->
                    <img src="../img/nav/notification.png" alt="N" class="navImg">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="navProfile" href="my.php">
                    <!--<i class="material-icons-outlined forNav">account_circle</i> <b class="navWritten">Profile</b>-->
                    <img src="../img/nav/profile.png" alt="P" class="navImg">
                </a>
            </li>
        </ul>
    </div>
</nav>