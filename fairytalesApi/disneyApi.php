<?php
header('Content-Type: application/json');

$disney = [
    1 => 'Moana',
    2 => 'Lilo & Stitch',
    3 => 'Wish',
    4 => 'Coco'
];

if (isset($_GET['search'])) {
    $getNum = $_GET['search'];

    if (isset($disney[$getNum])) {
        // Gibt nur den gewünschten Eintrag zurück
        echo json_encode([$getNum => $disney[$getNum]]);
    } else {
        http_response_code(404);
        echo json_encode(['fehler' => 'Film nicht gefunden']);
    }
} else {
    // Gibt alle Filme zurück
    echo json_encode($disney);
}