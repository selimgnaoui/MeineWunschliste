function startmeldung() {
    // alert('Cookie und DVSGO Meldung\n \nUnd hier kommt der passende Text rein.\nSind Sie damit einverstanden, drücken Sie auf den Button.\nAnsonsten verlassen Sie bitte die Seite.');
}

function switchCreateList() {
    // alert("switchlist aktiviert");
    var seite = document.getElementById("content");
    // alert(seite);
    // var neueSeite = "<?php include('main_start_loggedIn.php'); ?>";
    var neueSeite = 'main2.html';
    alert(neueSeite);
    seite.innerHTML ="";
    seite.innerHTML = neueSeite;

}

window.onload=()=> {
    startmeldung();
}