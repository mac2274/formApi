<?php
if (empty($_POST['frm_tel'])) {
    echo 'Keine Telefonnumer angegeben.';
    //echo 'Das Passwort fehlt.';
} else {
    $size = file_put_contents('daten/' . time(), json_encode($_POST));
    if ($size > 0) {
        echo 'ok';
    } else {
        echo 'Fehler beim Speichern.';
    }
}

?>