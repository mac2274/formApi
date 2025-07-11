<?php
header('Content-Type: application/json');

$fairytales = [
    ['story' => 'Schneewittchen'],
    ['story' => 'Hänsel und Gretel'],
    ['story' => 'Die kleine Meerjungfrau'],
    ['story' => 'Der Froschkönig oder der eiserne Heinrich'],
    ['story' => 'Brüderchen und Schwesterchen'],
    ['story' => 'Das tapfere Schneiderlein'],
    ['story' => 'Aschenputtel'],
    ['story' => 'Die Bremer Stadtmusikanten'],
    ['story' => 'König Drosselbart'],
    ['story' => 'Rumpelstilzchen'],
    ['story' => 'Schöne und das Biest']
];

echo json_encode($fairytales);

// Prüfen, ob Parameter übergeben wurde
if (isset($_GET['story'])){
    $filter = 'und';
    $search = str_contains($tale, $searchFor);
}

// if (isset(($_GET['story'])) === 'Aschenputtel'){
//     echo 'Du hast einen Treffer.';
// } else {
//     echo 'Leider keinen Treffer.';
// }

?>