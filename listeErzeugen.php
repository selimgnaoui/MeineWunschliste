<?php
    // Session wird gestartet
    session_start();
   if (!isset($_SESSION["user_id"]) ){
       header("location:../index.php");
   }
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

    <form class="form-horizontal" action="classes/saveEventsToDatabase.php" method="post">
        <fieldset>

            <!-- Form Name -->
            <legend>Veranstaltung Hinzüfügen</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Name</label>
                <div class="col-md-4">
                    <input id="name" name="event_name" type="text" placeholder="Veranstaltung" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="position">Date</label>
                <div class="col-md-4">
                    <input id="position" name="event_date" type="date" placeholder="position" class="form-control input-md required">

                </div>
            </div>
            <div class="form-group ">
                <label class="col-md-4 control-label" for="position">Event List</label>
                <table>
                    <thead>
                    <tr><th></th><th></th><th></th><th></th><th></th><th></th></tr>
                    </thead>
                  <tbody class="wishlist">
                  <tr>
                      <td>
                         Name <input type="text" name="wish[0][name]" class="form-control" required/>

                      </td>
                      <td>
                      Anzahl    <input type="number" name="wish[0][amount]" class="form-control" required/>

                      </td>
                      <td>
                       Anbieter   <input type="text" name="wish[0][anbieter]" class="form-control" required/>

                      </td>
                      <td>
                          Ort   <input type="text" name="wish[0][ort]" class="form-control" required/>

                      </td>
                      <td>
                          Preis   <input type="text" name="wish[0][preis]" class="form-control" required/>

                      </td>
                      <td></td>
                  </tr>

                  </tbody>

                </table>



            </div>

            <button type="button"  id="addrow" class="btn btn-primary btn-xs">
               </span> + <br></bt>
            </button>
        </fieldset><br><br>
        <input type="submit" class="btn btn-md btn-success" name="saveevents" value="Veranstaltung speichern" />
    </form>

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
