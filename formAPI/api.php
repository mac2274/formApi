<?php
require_once 'config/config.db.php';
require_once 'config/lib.php';

header('Content-Type: application/json; charset=utf-8');

$response = [];

if (empty($_POST['frm_tel'])) {
    $response = [
        'status' => 'error',
        'message' => 'Keine Telefonnumer angegeben.'
    ];
    http_response_code(400); // bad request
} else {
    $response = [
        'status' => 'ok',
        'message' => [
            "Erfolg" => 'Daten erfolgreich gespeichert.',
            'data' => $_POST['frm_tel']
        ]
    ];
    http_response_code(200);
}

// echo json_encode($response);

register($name, $tel, $pwd, $description);
