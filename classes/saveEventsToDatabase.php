<?php
require ('../db/dbLoginConnect.php');
session_start();
if (!isset($_SESSION["user_id"]) ){
    header("location:../index.php");
}

if (isset($_POST["saveevents"]) ) {

    $event_name = $_POST["event_name"];
    $event_date = $_POST["event_date"];


    $sql = "INSERT INTO events (name, Datum, user_id)
VALUES ('".$event_name."', '".$event_date."', '".$_SESSION["user_id"]."')";
   $conn->query($sql);
   $id =  mysqli_insert_id($conn);

    if ($id) {
        saveWishListItems($_POST["items"],$id,$conn);
        header("location:../meinlisten.php?user_id=".$_SESSION["user_id"]);
    } else {
        echo "Veranstaltung wurde nicht hinzegefügt : hier isr der  Grund <br>";
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function saveWishListItems($items,$event_id,$conn){
    foreach ($items as $item){

        $sql = "INSERT INTO wishlist (name, events)
VALUES ('".$item."', '".$event_id."')";
        $conn->query($sql);
       echo $conn->error;
    }


}