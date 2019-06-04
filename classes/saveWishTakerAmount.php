<?php
require ('../db/dbLoginConnect.php');
session_start();
if (!isset($_SESSION["user_id"]) ){
    header("location:../index.php");
}

if (isset($_POST["savewish"]) ) {

    $wish_id = $_POST["wish_id"];
    $event_id = $_POST["event_id"];
    $wish_amount = $_POST["wish_amount"];
    $comment=  $_POST["wish_comment"];
    $user_id = $_SESSION["user_id"];
    $date = date('Y-m-d');
    $sql = "INSERT INTO `wishlist_taken` (`wishlist_id`, `taker_id`, `Datum`, `Amount`,`Comment`) VALUES ('".$wish_id."', '".$user_id."', '".$date."', '".$wish_amount."','".$comment."');";
    $result = $conn->query($sql);
    $sql2="UPDATE wishlist
SET wishlist.anzahl = wishlist.anzahl - ".$wish_amount." where  wishlist.id=".$wish_id;
    $result2 = $conn->query($sql2);
    if($result && $result2){
        header("location:../showListDetails.php?event_id=".$event_id);
    }
    else {
        echo 'Fehler beim Speichern';

    }



}

