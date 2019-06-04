<?php
session_start();
if ( (!isset($_GET["event_id"]) || (!isset($_SESSION["user_id"])) )  ){
    header("location:../index.php");
}
require ('../db/dbLoginConnect.php');



$wish_id=$_GET["wish_id"];
$event_id=$_GET["event_id"];
$taker_id=($_SESSION["user_id"]);
$Datum = date('d-m-Y');
$sql = "UPDATE `wishlist` SET `total_taken` = '1', `total_taker_id` = '".$taker_id."' WHERE `wishlist`.`id` =".$wish_id;

$result = $conn->query($sql);

if($result){
    header("location:../showListDetails.php?event_id=".$event_id);
 }


