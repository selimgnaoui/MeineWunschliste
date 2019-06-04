<?php

require ('../db/dbLoginConnect.php');



$wish_id=$_GET["wish_id"];
$details = "";
$sql = 'SELECT wishlist_taken.* ,users.id as user_id ,users.username as user_username  FROM wishlist_taken 
LEFT JOIN wishlist ON wishlist_taken.wishlist_id=wishlist.id 
LEFT JOIN users ON wishlist_taken.taker_id=users.id 
WHERE wishlist_taken.wishlist_id='.$wish_id;

$result = $conn->query($sql);
$wishes = [];



if($result->num_rows > 0 ){
    while($row = $result->fetch_assoc()) {

        $details.="<li> Benutzer  ".$row['user_username']." hat  am " .$row['Datum']."  ".$row['Amount']."   strück übernommen  ".$row["Comment"]."</li> " ;
    }
}
else{
    $details = "es wurde bisher nicht übernommen";

}


echo $details;