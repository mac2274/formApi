<?php
header('Content-Type: application/json');

$dreamSpots = [
    "cities" => ['Bangkok', 'Hanoi', 'Melbourne', 'Lisboa', 'Seoul', 'Tokyo' ],
    "places" => ['Hawai', 'Iceland', 'Peru', 'Chile', 'Australia']
];

echo json_encode($dreamSpots, JSON_PRETTY_PRINT);
