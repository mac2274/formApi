<?php
require_once 'config/config.db.php';
require_once 'config/lib.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API erstellen</title>
    <style>
        body {
            width: fit-content;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 50%;
        }
    </style>
</head>

<body>
    <h1>Registrierung</h1>

    <form id="form" method="POST">
        <label for="name">Name
            <input type="text" value="Geri" name="frm_name" id="name">
        </label>
        <label for="tel">Telefonnumer
            <input type="tel" name="frm_tel" id="tel">
        </label>
        <label for="pwd">Passwort
            <input type="password" name="frm_pwd" id="pwd">
        </label>
        <label for="description">Bescheibung
            <textarea name="frm_descript" id="description"></textarea>
        </label>
        <input type="submit" name="frm_submit" value="Absenden" id="subBut">
    </form>

    <div id="fehler"></div>

    <?php
        register($name, $tel, $pwd, $description);
    ?>

    <script>
        // 1. Formular abfangen, Absendeprozess abbrechen
        // 2. Formulardaten holen
        // 3. Daten versenden
        // 4. Rückmeldung an User

        async function RegFormSend(event) {
            event.preventDefault();
            //console.log("test2");

            var formData = new FormData(RegForm);
            console.log(Object.fromEntries(formData.entries()));
            const response = await fetch("api.php", {
                method: "post",
                body: formData,
                accept: "application/json"
            });

            const antwort = await response.text();
            console.log(antwort);
            if (antwort == 'ok') {
                RegForm.innerHTML = "Erfolgreich abgesendet.";
            } else {
                document.querySelector('#fehler').innerHTML = "Ergebnis: " + antwort;
            }
        }

        const RegForm = document.querySelector('form');
        RegForm.addEventListener("submit", RegFormSend);

    </script>
</body>

</html>