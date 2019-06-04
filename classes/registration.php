<?php
require ('../db/dbLoginConnect.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST["submit"]) ) {
     $username=$_POST["username"];
     $password=$_POST["password"];
     $name=$_POST["name"];
     $vorname=$_POST["nachname"];

     if (checkIfBenutzerNameexists($username,$conn)) {

         saveBenutzerAnlegen($vorname,$name,$username,$password,$conn);
         header("location:../login.php");
     }

} else {
    echo "Fehler beim REGISTRIEN ";
}


// guckt ob der Benutzer name schon bereit vergeben ist
function checkIfBenutzerNameexists($username,$conn){

    $sql = 'SELECT * from users where users.username="'.$username.'"';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo 'Benutzer name schon vergeben';
        return false;
    }
    return true;

}

function saveBenutzerAnlegen ($vornmame,$nachname,$username,$password,$conn){
   $sql = "INSERT INTO `users` (`id`, `vorname`, `nachname`, `username`, `password`) VALUES (NULL, '".$vornmame."', '".$nachname."', '".$username."', '".$password."');";
   return  $conn->query($sql);
}