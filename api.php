<?php

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

$products = [
    ["id" => 1, "product" => "Milk", "price" => 50],
    ["id" => 2, "product" => "Bread", "price" => 35]
];



if ($method == "GET" && !isset($_GET['id'])) {
    echo json_encode($products);
    exit;
}



if ($method == "GET" && isset($_GET['id'])) {
    foreach ($products as $p) {
        if ($p['id'] == $_GET['id']) {
            echo json_encode($p);
            exit;
        }
    }

    echo json_encode(["message" => "Not found"]);
    exit;
}



if ($method == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    echo json_encode([
        "message" => "Product created (simulation only)",
        "data" => $data
    ]);
    exit;
}



if ($method == "PUT") {
    $data = json_decode(file_get_contents("php://input"), true);

    echo json_encode([
        "message" => "Product updated (simulation only)",
        "data" => $data
    ]);
    exit;
}



if ($method == "DELETE") {
    $data = json_decode(file_get_contents("php://input"), true);

    echo json_encode([
        "message" => "Product deleted (simulation only)",
        "id" => $data['id']
    ]);
    exit;
}

?>
