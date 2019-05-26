<?php
    // Session wird gestartet
    session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Eigene CSS -->
    <link rel="stylesheet" href="css/MWstyles.css"/>
    <title>MeineWunschliste</title>
</head>

<body>

<?php
    // Header wird eingebaut
    include('header.php');
?>

<div id="content">

    <!--WENN NICHT EINGELOGGT-->
    <?php if (!isset($_Session['logged'])) { include('./ressources/main.php');} ?>

    <!--WENN EINGELOGGT-->
    <?php if (isset($_Session['logged'])) { include('./ressources/main_liste_suchen_loggedIn.php');} ?>


</div>


<?php

    // Footer wird eingebaut
    include('footer.php');
?>


<!-- Optional JavaScript -->
</body>

</html>
