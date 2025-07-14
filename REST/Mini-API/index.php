<?php
header('Content-Type: application/json');

// Lade Buchdaten aus Datei
$datenPfad = 'buecher.json';
$buecher = json_decode(file_get_contents($datenPfad), true);

// Hole Pfad und Methode
$pfad = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$methode = $_SERVER['REQUEST_METHOD'];

// Routing
if ($methode === 'GET' && $pfad === '/buecher') {
    echo json_encode($buecher, JSON_PRETTY_PRINT);
    exit;
}

if ($methode === 'GET' && preg_match('#^/buecher/([^/]+)$#', $pfad, $matches)) {
    $isbn = $matches[1];
    foreach ($buecher as $buch) {
        if ($buch['isbn'] === $isbn) {
            echo json_encode($buch, JSON_PRETTY_PRINT);
            exit;
        }
    }
    http_response_code(404);
    echo json_encode(["fehler" => "Buch nicht gefunden"]);
    exit;
}

if ($methode === 'POST' && $pfad === '/buecher') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!isset($input['title'], $input['author'], $input['year'], $input['isbn'])) {
        http_response_code(400);
        echo json_encode(["fehler" => "Ungültige Eingabe"]);
        exit;
    }

    // Neuen Eintrag hinzufügen
    $buecher[] = $input;
    file_put_contents($datenPfad, json_encode($buecher, JSON_PRETTY_PRINT));

    http_response_code(201);
    echo json_encode(["nachricht" => "Buch hinzugefügt"]);
    exit;
}

http_response_code(404);
echo json_encode(["fehler" => "Route nicht gefunden"]);