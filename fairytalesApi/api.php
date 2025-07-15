<?php
//header('Content-Type: application/json');

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


// Prüfen, ob Parameter übergeben wurden
if (isset($_GET['search'])) {
    $searchInput = $_GET['search'];

    //gefilterte Ergebnisse sammelen
    $filteredResults = [];

    // durch alle Märchendurchgehen
    foreach ($fairytales as $tale) {
        // Prüfen ob der Suchbegriff im Titel vorkommt
/*         Wie strpos() funktioniert:
            Die Funktion strpos() sucht nach einem String in einem anderen String
            Sie gibt die Position (Index) zurück, wo der Suchbegriff beginnt
            Wenn nichts gefunden wird, gibt sie false zurück

*/
        if (strpos($tale['story'], $searchInput) !== false) {
            $filteredResults[] = $tale;
        }
    }

    echo json_encode($filteredResults);
    // mein falscheransatz: $filter = str_contains($fairytales, $searchFor);
} else {
    echo json_encode($fairytales);
}

// if (isset(($_GET['story'])) === 'Aschenputtel'){
//     echo 'Du hast einen Treffer.';
// } else {
//     echo 'Leider keinen Treffer.';
// }

?>