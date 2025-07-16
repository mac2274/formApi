<?php

header('Content-Type: application/json');

//array
$fruits = [
    'eastern' => ['dragonfruit', 'durian', 'jackfruit', 'lychee', 'mango'],
    'western' => ['raspberry', 'strawberry', 'pear', 'apple', 'cherry'],
    'southern' => ['grapes', 'lemon', 'oranges', 'banana']
];

//logik
if (isset($_GET['search'])) {
    $searchFruit = $_GET['search'];

    $filteredResults = [];

    foreach ($fruits as $region => $regionFruits) {
        foreach ($regionFruits as $fruit) {
            if (strpos($fruit, $searchFruit) !== false) {
                $filteredResults[] = [
                    'message' => "Dein Ergebnis:",
                    'region' => $region,
                    'fruit' => $fruit
                ];
            }
        }
    }
    echo json_encode($filteredResults);
} else {
    // echo 'Kein Suchergebnis.';
    echo json_encode($fruits);
}

