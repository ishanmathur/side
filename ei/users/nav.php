<style>
    nav { position: fixed; width: 100%; z-index: 9999; }
    .nav-link { color: gray }
    @media only screen and (min-width: 600px) {
        ul { max-width: 600px; }
        nav { top: 0; box-shadow: 0 2px 8px #a6a6a6; }
        .navWritten { font-size: 15px; }
        .activehai { border-bottom: 3px solid; }
    }
    @media only screen and (max-width: 599px) {
        nav { box-shadow: 0 -2px 8px #a6a6a6; }
        .navWritten { display: block; font-size: 2vw; }
        nav { bottom: 0; }
        .material-icons-outlined { font-size: 6vw; }
        .activehai { border-top: 3px solid; }
    }
    @media only screen and (max-width: 450px) {
        .navWritten { display: none; font-size: 3vw; }
        nav { bottom: 0; }
        .material-icons-outlined { font-size: 8vw; }
        .activehai { border-top: 3px solid; }
    }
</style>
<nav class="navbar-light bg-light">
    <ul class="nav nav-fill">
        <li class="nav-item">
            <a class="nav-link" id="navHome" href="../"><i class="material-icons-outlined">home</i> <b class="navWritten">Home</b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="navSearch" href="search.php"><i class="material-icons-outlined">search</i> <b class="navWritten">Search</b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="navNotif" href="../notif"><i class="material-icons-outlined">notifications_active</i> <b class="navWritten">Notif's</b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="navProfile" href="my.php"><i class="material-icons-outlined">account_circle</i> <b class="navWritten">Profile</b></a>
        </li>
    </ul>
</nav>
