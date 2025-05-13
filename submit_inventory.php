<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

$host = "localhost";
$dbname = "yaasglow_db";
$username = "your_db_user";
$password = "your_db_password";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
  http_response_code(500);
  echo json_encode(["message" => "Database connection failed"]);
  exit();
}

$data = json_decode(file_get_contents("php://input"), true);

$product = $conn->real_escape_string($data["product"]);
$stock = (int)$data["stock"];
$type = $conn->real_escape_string($data["updateType"]);
$updatedBy = $conn->real_escape_string($data["updatedBy"]);

$sql = "INSERT INTO inventory (product_name, stock_quantity, update_type, updated_by)
        VALUES ('$product', $stock, '$type', '$updatedBy')";

if ($conn->query($sql)) {
  echo json_encode(["message" => "Data inserted successfully"]);
} else {
  http_response_code(500);
  echo json_encode(["message" => "Failed to insert data"]);
}

$conn->close();
?>
