<?php

    session_start();
   if (!isset($_GET["event_id"]) ){
       header("location:../index.php");
   }
   require ('db/dbLoginConnect.php');

   $event_id=$_GET["event_id"];



$sql = 'SELECT wishlist.*, u.vorname as user_name, u.id as user_id, e.id as event_id, e.Datum as event_datum, e.name as event_name from wishlist
 LEFT join events e on e.id=wishlist.events  LEFT join users u on u.id=e.user_id  
 where wishlist.events='.$event_id;

$result = $conn->query($sql);
$result2 = $conn->query($sql);

$invitation_text='Hallo, Ich lade Sie herzlich zu '.$result->fetch_assoc()["event_name"].' , die findent am '.$result->fetch_assoc()["event_datum"].' statt. Anbei ist der Link zu meinen WünschListe 

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
                                <strong><a  class="post-title"><?php echo $result->fetch_assoc()["event_name"]; ?></a></strong></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 post-header-line">
                            <span class="glyphicon glyphicon-user"></span>by <a href="#"><?php echo $result2->fetch_assoc()["user_name"]; ?></a> | <span class="glyphicon glyphicon-calendar">
                            </span><?php echo $result2->fetch_assoc()["event_datum"]; ?>
                        </div>
                    </div>
                    <div class="row post-content">

                      <ul>
                     <?php
                     if ($result->num_rows > 0) {
                     // output data of each row
                     while($row = $result2->fetch_assoc()) {
                    echo '<li>'.$row['name'].'</li>';
                     }
                     }

                     ?>


                      </ul>
                        <div class="col-md-9">
                            <p>

                            </p>
                            <p>
                              
                        </div>
                    </div>
                </div>
            </div></div>
<div class="">
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


<!-- Optional JavaScript -->
<script type="application/javascript" src="js/startup.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
