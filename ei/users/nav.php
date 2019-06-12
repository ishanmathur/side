<style>
    nav { position: fixed; width: 100%; z-index: 9999; }
    .nav-link { color: gray }
    @media only screen and (min-width: 600px) {
        ul { max-width: 600px; }
        nav { top: 0; box-shadow: 0 2px 8px #a6a6a6; }
        .navWritten { font-size: 15px; }
        .activehai { border-bottom: 3px solid; color: #007bff; }
    }
    @media only screen and (max-width: 599px) {
        nav { box-shadow: 0 -2px 8px #a6a6a6; }
        .navWritten { display: block; font-size: 2vw; }
        nav { bottom: 0; }
        .forNav { font-size: 6vw; }
        .activehai { border-top: 3px solid; color: #007bff; }
    }
    @media only screen and (max-width: 450px) {
        .navWritten { display: none; font-size: 3vw; }
        .forNav { font-size: 8vw; }
    }
</style>
<nav class="navbar-light bg-light">
    <ul class="nav nav-fill">
        <li class="nav-item">
            <a class="nav-link" id="navHome" href="../"><i class="material-icons-outlined forNav">home</i> <b class="navWritten">Home</b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="navSearch" href="q.php"><i class="material-icons-outlined forNav">search</i> <b class="navWritten">Search</b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="navNotif" href="../notif"><i class="material-icons-outlined forNav">notifications_active</i> <b class="navWritten">Notif's</b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="navProfile" href="my.php"><i class="material-icons-outlined forNav">account_circle</i> <b class="navWritten">Profile</b></a>
        </li>
    </ul>
</nav>