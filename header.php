<header>

    <!-- HEADER INHALT -->

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="#">meineWunschliste</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" href="index.php">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listeErzeugen.php" >Liste erzeugen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="listeSuchen.php">Liste suchen</a>
                </li>
                <li>
                <div class="nav-item">

                    <!--WENN NICHT EINGELOGGT-->
                    <?php if (!isset($_Session['logged'])) { ?>
                        <a class="nav-link" href="login.php">Login</a>
                    <?php } ?>

                    <!--WENN EINGELOGGT-->
                    <?php if (isset($_Session['logged'])) { ?>
                        <a class="nav-link" href="logout.php">Logout</a>
                    <?php } ?>

                </div>
                </li>

                <!--DAS ALTE DROPDOWN MENÜ... ERSETZT DURCH: "WENN EINGELOGGT..." über der Zeile
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="login.php">Login</a>
                        <a class="dropdown-item" href="registration.php">Register</a>
                    </div>
                </li>-->
            </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">

            <li><a href="log-out.php"><?php ?></a></li>

            <?php if (!isset($_SESSION['logged'])) { ?>
                <li><a href="login.php" id="admin-log"><span class="glyphicon glyphicon-login"></span> Sign in</a>
                </li>
            <?php } ?>

            <?php if (isset($_SESSION['logged'])) { ?>
                <li><a href="logout.php"><span class="glyphicon glyphicon-logout"></span> Log out</a></li>
            <?php } ?>
        </ul>
    </nav>

</header>