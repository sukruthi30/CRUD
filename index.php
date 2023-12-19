<?php
include_once 'products.php';

// Handle HTTP requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode(getProducts());
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    addProduct($data->name, $data->description, $data->price);
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    parse_str(file_get_contents("php://input"), $data);
    updateProduct($data['id'], $data['name'], $data['description'], $data['price']);
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    deleteProduct($data['id']);
}
?>
