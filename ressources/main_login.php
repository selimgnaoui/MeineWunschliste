<?php
 include('./db/dbLoginConnect.php');
?>

<main>
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Login</h1>
                        <form method="POST" action="../classes/login.php" onsubmit="return pruefung();">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input name="username" required type="text" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Bitte Username eingeben...">
                                <small id="emailHelp" class="form-text text-muted">Bitte benutzen Sie die Email-Adresse, mit der Sie sich registriert haben!</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="Passwort" name="password" placeholder="Passwort" required>
                            </div>

                            <button type="submit" class="btn btn-primary" name="submit" value="bestätigen">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Login</h1>
                        <p class="lead">Hier kommen informationen zu unserem Wunschlisten-System. Ganz viele Informationen, die hier rein geschrieben werden müssen. Eventuell machen wir auch noch ein paar Bilder rein, aber das haben wir noch nicht besprochen, als daß ich dazu schon eine Aussage machen könnte.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>