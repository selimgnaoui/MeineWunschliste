<?php
    // Session wird gestartet
    session_start();
   if (!isset($_GET["keyword"]) ){
       header("location:../index.php");
   }
   require ('db/dbLoginConnect.php');

   $keyword=$_GET["keyword"];

//$sql = 'SELECT * FROM `wishlist` WHERE wishlist.events in (SELECT events.id FROM events LEFT JOIN users ON events.user_id = users.id WHERE users.id='.$_GET["user_id"].')';

$sql = 'SELECT * FROM users where users.vorname LIKE \'%'.$keyword.'%\' OR users.nachname LIKE \'%'.$keyword.'%\' or users.username LIKE \'%'.$keyword.'%\'
';

$result = $conn->query($sql);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>MeineWunschliste</title>
</head>

<body>

<?php
    // Header wird eingebaut
    include('header.php');
?>
<br><br><br>
<div class="container">

    <table class=" table table-striped custab" action="classes/saveEventsToDatabase.php" method="post">


            <thead>

            <tr>
                <th>Benutzer name</th>
                <th>Name</th>
                <th>Nachname</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<tr>
               <td>'.$row["username"].'</td>
                <td>'.$row["vorname"].'</td>
                <td>'.$row["nachname"].'</td>
                <td> <a href="meinlisten.php?user_id='.$row["id"].'"> Anzeigen </td>
                </tr>';


                }
            }
            else {
                echo "Keine Ergebnis gefunden";
            }
            $conn->close();



            ?>
        </tbody>
    </table>

</div>


<?php

    // Footer wird eingebaut
    include('footer.php');
?>


<!-- Optional JavaScript -->
<script type="application/javascript" src="js/startup.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
