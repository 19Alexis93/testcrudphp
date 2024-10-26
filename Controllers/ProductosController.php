<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
require_once '../Database/Conexion.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        handleGet($conexion);
        break;
    case 'POST':
        handlePost($conexion, $input);
        break;
    case 'PUT':
        handlePut($conexion, $input);
        break;
    case 'DELETE':
        handleDelete($conexion, $input);
        break;
    default:
        echo json_encode(['message' => 'Invalid request method']);
        break;
}

function handleGet($conexion)
{
    $sql = "SELECT * FROM product";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

function handlePost($conexion, $input)
{
    $sql = "INSERT INTO product (code, name, category, price, createdAt, updatedAt) VALUES (:code, :name, :category, :price, :createdAt, :updatedAt)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        'code' => $input['code'],
        'name' => $input['name'],
        'category' => $input['category'],
        'price' => $input['price'],
        'createdAt' => $input['createdAt'],
        'updatedAt' => $input['updatedAt']
    ]);
    echo json_encode(['message' => 'Product created successfully']);
}

function handlePut($conexion, $input)
{
    $sql = "UPDATE product SET name = :name, category = :category, price = :price, updatedAt = :updatedAt WHERE code = :code";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        'name' => $input['name'],
        'category' => $input['category'],
        'price' => $input['price'],
        'updatedAt' => $input['updatedAt'],
        'code' => $input['code']
    ]);
    echo json_encode(['message' => 'Product updated successfully']);
}

function handleDelete($conexion, $input)
{
    $sql = "DELETE FROM product WHERE code = :code";
    $stmt = $conexion->prepare($sql);
    $stmt->execute(['code' => $input['code']]);
    echo json_encode(['message' => 'Produc deleted successfully']);
}
