<?php

// Daten der Datenbank in Variablen legen
$dbServerName = "schume-images.de.mysql";
$dbUserName = "schume_images_de_mwldb";
$dbPassword = "4roundTheCl0ck";
$dbName = "mWlDB";

// Verbindungsaufbau
mysqli_connect($dbServerName, $dbUserName, $dbPassword,$dbName);
//mysqli_selectdb($db,$dbName);

// Prüfe Verbindung
//if (mysqli_connect($dbServerName, $dbUserName, $dbPassword,$dbName) ->connect_error) {
//    die("Verbindungsfehler: " . mysqli_connect($dbServerName, $dbUserName, $dbPassword,$dbName)->connect_error);
//}

// Wenn Felder nicht leer...
if ( (!empty($_POST['Email'])) && !empty($_POST['Passwort'])) {
    echo("USER AKTZEPTIERT");

}

?>