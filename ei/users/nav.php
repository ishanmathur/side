<style>
    #menu {
        position: fixed;
        width: 100%;
        z-index: 9999;
    }
    .nav-link { color: gray }
    @media only screen and (min-width: 600px) {
        #menu { top: 0; border-bottom: 1px solid #d9d9d9; }
        ul { max-width: 600px; }
        .navWritten { font-size: 15px; }
        .activehai { border-bottom: 3px solid #007bff; color: #007bff; }
    }
    @media only screen and (max-width: 599px) {
        #menu { border-top: 1px solid #d9d9d9; bottom: 0;}
        .navWritten { font-size: 2vw; display: block; }
        .forNav { font-size: 6vw; }
        .activehai { color: #007bff; }
    }
    @media only screen and (max-width: 450px) {
        .navWritten { display: none; font-size: 3vw; }
        .forNav { font-size: 8vw; }
    }
</style>
<nav id="menu" class="navbar-light bg-light">
    <div align="center">
        <ul class="nav nav-fill">
            <li class="nav-item">
                <a class="nav-link" id="navHome" href="../"><i class="material-icons-outlined forNav">home</i> <b class="navWritten">Home</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="navSearch" href="q.php"><i class="material-icons-outlined forNav">search</i> <b class="navWritten">Search</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="navMessage" href="message.php"><i class="material-icons-outlined forNav">question_answer</i> <b class="navWritten">Chats</b></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="navProfile" href="my.php"><i class="material-icons-outlined forNav">account_circle</i> <b class="navWritten">Profile</b></a>
            </li>
        </ul>
    </div>
</nav>