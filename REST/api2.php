<?php

function sendJsonResponse($data, $statusCode = 200) {
    header('Content-Type: application/json');
    http_response_code($statusCode);
    echo json_encode($data);
    exit();
}

$books = [
    1 => ["title" => "To Kill a Mockingbird", "author" => "Harper Lee", "year" => 1960, "isbn" => "978-0-06-112008-4"],
    2 => ["title" => "1984", "author" => "George Orwell", "year" => 1949, "isbn" => "978-0-452-28423-4"],
    3 => ["title" => "Moby Dick", "author" => "Herman Melville", "year" => 1851, "isbn" => "978-0-14-243724-7"],
    4 => ["title" => "The Great Gatsby", "author" => "F. Scott Fitzgerald", "year" => 1925, "isbn" => "978-0-7432-7356-5"]
];

$requestMethod = $_SERVER["REQUEST_METHOD"];
$requestUri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$resource = array_shift($requestUri);
$id = array_shift($requestUri);

switch ($requestMethod) {
    case 'GET':
        if ($resource == 'books') {
            if ($id) {
                if (isset($books[$id])) {
                    sendJsonResponse($books[$id]);
                } else {
                    sendJsonResponse(["message" => "Book not found"], 404);
                }
            } else {
                sendJsonResponse($books);
            }
        }
        break;

    case 'POST':
        if ($resource == 'books') {
            $input = json_decode(file_get_contents('php://input'), true);
            if ($input && isset($input['title'], $input['author'], $input['year'], $input['isbn'])) {
                $id = count($books) + 1;
                $books[$id] = $input;
                sendJsonResponse($books[$id], 201);
            } else {
                sendJsonResponse(["message" => "Invalid input"], 400);
            }
        }
        break;

    case 'PUT':
        if ($resource == 'books' && $id) {
            $input = json_decode(file_get_contents('php://input'), true);
            if (isset($books[$id])) {
                if ($input && isset($input['title'], $input['author'], $input['year'], $input['isbn'])) {
                    $books[$id] = $input;
                    sendJsonResponse($books[$id]);
                } else {
                    sendJsonResponse(["message" => "Invalid input"], 400);
                }
            } else {
                sendJsonResponse(["message" => "Book not found"], 404);
            }
        }
        break;

    case 'DELETE':
        if ($resource == 'books' && $id) {
            if (isset($books[$id])) {
                unset($books[$id]);
                sendJsonResponse(["message" => "Book deleted"]);
            } else {
                sendJsonResponse(["message" => "Book not found"], 404);
            }
        }
        break;

    default:
        sendJsonResponse(["message" => "Method not allowed"], 405);
        break;
}
?>