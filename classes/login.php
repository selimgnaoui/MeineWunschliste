<?php
require ('../db/dbLoginConnect.php');

if (isset($_POST["submit"]) ) {
     $username=$_POST["username"];
     $password=$_POST["password"];


    $sql = 'SELECT * from users where users.username="'.$username.'" and users.password="'.$password.'"';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            session_start();
            $_SESSION["user_id"] = $row["id"];
            header("location:../index.php");

        }
    } else {
        echo "Benutzer name ist falsch";
    }
    $conn->close();

} else {
    echo "Fehler beim login";
}

