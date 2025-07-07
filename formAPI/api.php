<?php
// header('Content-Type: application/json; charset=utf-8');

// if (empty($_POST['frm_tel'])) {
//     echo 'Keine Telefonnumer angegeben.';
//     //echo 'Das Passwort fehlt.';
// } else {
//     $size = file_put_contents('daten/' . time(), json_encode($_POST));
//     if ($size > 0) {
//         echo 'ok';
//     } else {
//         echo 'Fehler beim Speichern.';
//     }
// }

// 2. variante: header('Content-Type: application/json; charset=utf-8');

// $response = [];

// if (empty($_POST['frm_tel'])) {
//     $response['status'] = 'error';
//     $response['error'] = 'Keine Telefonnumer angegeben.';
//     http_response_code(400); // Bad Request
// } else {
//     $response['status'] = 'ok';
//     $response['message'] = 'Daten erfolgreich gespeichert.';
//     http_response_code(200); // Internal Server Error
// }

// echo json_encode($response);

// 3. variante 
header('Content-Type: application/json; charset=utf-8');

$response = [];

if (empty($_POST['frm_tel'])) {
    $response = [
        'status' => 'error',
        'error' => 'Keine Telefonnumer angegeben.'
    ];
    http_response_code(400); // Bad Request
} else {
    $response = [
        'status' => 'ok',
        'message' => [
            "erfolg" => 'Daten erfolgreich gespeichert.',
            'data' => $_POST['frm_tel']
        ]
    ];
    http_response_code(200); // Internal Server Error
}

echo json_encode($response);

?>