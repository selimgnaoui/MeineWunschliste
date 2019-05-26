<?php
session_start();
if ( (!isset($_GET["event_id"]) || (!isset($_SESSION["user_id"])) )  ){
    header("location:../index.php");
}
require ('../db/dbLoginConnect.php');



$event_id=$_GET["event_id"];
$sql = 'DELETE FROM events  WHERE events.id='.$event_id;

$result = $conn->query($sql);

if($result){
    header("location:../meinlisten.php?user_id=".($_SESSION["user_id"]));
 }


