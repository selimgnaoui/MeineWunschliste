function navChange(site) {
    if (site="makelist") {
        var seite = document.getElementById("container");
        seite.innerHTML = '<?php\ninclude('main.php');\n?>';

    }
}