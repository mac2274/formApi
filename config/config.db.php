<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = new mysqli('db', 'root', 'test', 'erinnerungsDB');

if($mysqli->connect_errno){
    throw new RuntimeException('mysqli-Verbindungsfehler: '. $mysqli->connect_error);
//} else{
    //Fehlerbehandlung hier
}

?>