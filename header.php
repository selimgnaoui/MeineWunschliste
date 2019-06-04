
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
require ('includes.php');
?>
<header>

    <!-- HEADER INHALT -->

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="#">meineWunschlistea</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" href="index.php">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php if (isset($_SESSION["user_id"]) )
                {

                  echo ' <li class="nav-item">
                    <a class="nav-link" href="listeErzeugen.php" >Liste erzeugen</a>
                </li>   ';
                    echo ' <li class="nav-item">
                    <a class="nav-link" href="meinlisten.php?user_id='.$_SESSION["user_id"].'" >Meine Liste</a>
                </li>   ';
                }

                ?>



                <li class="nav-item">
                    <form class="form-search" action="showAllusers.php" METHOD="Get">
                        <div class="input-append">
                            <input name="keyword" type="text" class="span2">
                            <button type="submit" class="btn-read-more">Suche</button>
                        </div>
                    </form>
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
            <a class="nav-link" href="register.php">Registrieren</a>
            <!--WENN NICHT EINGELOGGT-->
            <?php if (!isset($_SESSION['user_id'])) { ?>
                <a class="nav-link" href="login.php">Login</a>

            <?php } ?>

            <!--WENN EINGELOGGT-->
            <?php if (isset($_SESSION['user_id'])) { ?>
                <a class="nav-link" href="classes/logout.php">Log out</a>
            <?php } ?>
        </ul>
    </nav>

</header>