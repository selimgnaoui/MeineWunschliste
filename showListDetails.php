<?php

    session_start();
   if (!isset($_GET["event_id"]) ){
       header("location:../index.php");
   }
   require ('db/dbLoginConnect.php');

   $event_id=$_GET["event_id"];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sql = 'SELECT wishlist.*, u.vorname as user_name, u.id as user_id, e.id as event_id, e.Datum as event_datum, e.name as event_name from wishlist
 LEFT join events e on e.id=wishlist.events  LEFT join users u on u.id=e.user_id  
 where wishlist.events='.$event_id;

$result = $conn->query($sql);
$result2 = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $event_name=$row["event_name"];
    $event_datum=$row["event_datum"];
    $event_user_name=$row["user_name"];
    $event_id=$row["event_id"];
}
$invitation_text='Hallo, Ich lade Sie herzlich zu '.$event_name.' , die findent am '.$event_datum.' statt. Anbei ist der Link zu meinen WünschListe 

'.$_SERVER['SERVER_NAME'].'/showListDetails.php?event_id='.$event_id.'';
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

                  <div class="row">
                <div class="col-md-12 post">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>
                                <strong><a  class="post-title"><?php echo $event_name; ?></a></strong></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 post-header-line">
                            <span class="glyphicon glyphicon-user"></span>by <a href="#"><?php echo $event_user_name ;?></a> | <span class="glyphicon glyphicon-calendar">
                            </span><?php echo $event_datum; ?>
                        </div>
                    </div>
                    <div class="row post-content">

                      <table class="table table-striped custab">
                          <thead>
                          <th>
                              Wünsche
                          </th>
                          <th>
                              Geblieben Anzahl
                          </th>
                          <th>
                              Anbieter
                          </th>
                          <th>
                              Preis
                          </th>
                          <th>
                              Ort
                          </th>
                          <th>
                              Action
                          </th>
                          </thead><tbody>
                     <?php
                     if ($result2->num_rows > 0) {
                     // output data of each row
                     while($row = $result2->fetch_assoc()) {
                    echo '<tr>
<td>'.$row['name'].'</td>
<td>'.$row['anzahl'].'</td>
<td>'.$row['anbieter'].'</td>
<td>'.$row['preis'].'</td>
<td>'.$row['ort'].'</td>';

echo '<td>';

 if ($row['anzahl'] > 0 && isset($_SESSION["user_id"])){

     echo '<button id="showubernahmemodel" wish-anzahl="'.$row['anzahl'].'" event-id="'.$event_id.'" data-wish="'.$row['id'].'" data-toggle="modal" class="btn btn-info btn-xs showmodal" data-target="#squarespaceModal"><span class="glyphicon glyphicon-edit"></span> Teil  Übernehmen</button>';
 }

    echo '  <a data-toggle="modal" class="btn btn-info btn-xs showListDetails" data-target="#modal_wish_details" wish-id="'.$row['id'].'">Details</a>';

                         echo '</td>';
echo '</tr>';
                     }
                     }

                     ?>

                          </tbody>
                      </table>
                        <div class="col-md-9">
                            <p>

                            </p>
                            <p>
                              
                        </div>
                    </div>
                </div>
            </div></div>
<div class="container">
    <div class="form-area">
        <form role="form" action="classes/sendMail.php" method="POST">
            <br style="clear:both">
            <h3 style="margin-bottom: 25px; text-align: center;">Freunde Einladen</h3>
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="message"  type="textarea" id="message" placeholder="Message" maxlength="250" rows="7"><?php
                    echo $invitation_text;
                    ?></textarea>
            </div>

            <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Submit Form</button>
        </form>
    </div>
</div>


</div>

    </table>



<?php

    // Footer wird eingebaut
    include('footer.php');
?>
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

            </div>
            <div class="modal-body">

                <!-- content goes here -->
                <form action="classes/saveWishTakerAmount.php" method="POST">
                    <div class="form-group">
                        <span id="maximumamountSpan"></span>

                    </div>

                    <div class="form-group">
                        <label for="amount">Amount </label>
                        <input  type="number" name="wish_amount" class="form-control" id="wish_amount" placeholder="Anzahl übernehmen">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Kommentar</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="wish_comment" placeholder="Kommentar">
                    </div>
                    <input type="text" hidden aria-hidden="true"  class="form-control" name="wish_id" id="wish_id" >
                    <input type="text" hidden aria-hidden="true"  class="form-control" name="event_id" id="event_id" >
                    <input type="text" hidden aria-hidden="true"  class="form-control" name="anzahl" id="anzahl" >


            </div>
            <div class="modal-footer">
                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Schliessen</button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="submit" id="savewish" name="savewish" class="btn btn-default btn-hover-green"  role="button">Übernehmen</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="modal_wish_details" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

            </div>
            <div class="modal-body">

                <!-- content goes here -->
                <div a>
                    <div class="post-content" id="wish_list_history">

                    </div>

            </div>
            <div class="modal-footer">
                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Schliessen</button>
                    </div>

                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<script type="application/javascript" src="js/startup.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
