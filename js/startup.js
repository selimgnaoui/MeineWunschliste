function startmeldung() {
    // alert('Cookie und DVSGO Meldung\n \nUnd hier kommt der passende Text rein.\nSind Sie damit einverstanden, drücken Sie auf den Button.\nAnsonsten verlassen Sie bitte die Seite.');
}

function pruefung() {
    var pruefung = "ok";
    alert('PRÜFUNG DER LOGINDATEN');
    if (pruefung == "ok") {
        alert('DATEN SIND OK');
        return true;
    } else {
        alert('DATEN SIND FALSCH');
        return false;
    }


}

function usercheck() {

}

window.onload=()=> {
    // startmeldung();
}