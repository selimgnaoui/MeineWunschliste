<?php

// Daten der Datenbank in Variablen legen
$dbServerName = "schume-images.de.mysql";
$dbUserName = "schume_images_de_mwldb";
$dbPassword = "4roundTheCl0ck";
$dbName = "mWlDB";

// Verbindungsaufbau
$connect = new mysqli($dbServerName, $dbUserName, $dbPassword,$dbName);

// Prüfe Verbindung
if ($connect ->connect_error) {
    die("Verbindungsfehler: " . $connect->connect_error);
}