<main>
    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Login</h1>
                        <form method="POST" action="../classes/registration.php" onsubmit="return pruefung();">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input name="name" required type="text" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Bitte Name eingeben...">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nachname</label>
                                <input name="nachname" required type="text" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Bitte Nachname eingeben...">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Benutzername</label>
                                <input name="username" required type="text" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Bitte Username eingeben...">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Passwort" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="onfirm_password" placeholder="Passwort" laceholder="Bitte password wieder eingeben..." required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" value="bestätigen">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>