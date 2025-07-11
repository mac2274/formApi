<?php

// Bestimme die HTTP-Methode der Anfrage
$requestMethod = $_SERVER["REQUEST_METHOD"];
echo $requestMethod . ': <br>';

// Extrahiere die URI und entferne führende und abschließende Schrägstriche
$requestUri = trim($_SERVER['REQUEST_URI'], '/');
echo $requestUri . '<br>';

// Zerlege die URI in ihre Teile
$uriParts = explode('/', $requestUri);
echo 'for ($i = 1; $i <= 10; $i++) {
    echo $i;
}<br>';

// Die erste Komponente ist die Ressource (z.B. 'books')
$resource = array_shift($uriParts);
echo $resource . '<br>';

// Die zweite Komponente ist die ID (falls vorhanden)
$id = array_shift($uriParts);
echo $id . '<br>';