<?php

// 1. Header setzen, damit der Browser weiß: Es kommt JSON
header('Content-Type: application/json');

// 2. Ein Array von Büchern definieren
$buecher = [
    [
        "title" => "To Kill a Mockingbird",
        "author" => "Harper Lee",
        "year" => 1960,
        "isbn" => "978-0-06-112008-4"
    ],
    [
        "title" => "1984",
        "author" => "George Orwell",
        "year" => 1949,
        "isbn" => "978-0-452-28423-4"
    ],
    [
        "title" => "Brave New World",
        "author" => "Aldous Huxley",
        "year" => 1932,
        "isbn" => "978-0-06-085052-4"
    ]
];

// 3. In JSON umwandeln
$json = json_encode($buecher, JSON_PRETTY_PRINT);

// 4. Ausgabe
echo $json;

?>