<?php 

include "../connection.php";
$id = $_POST['expense_id'];

$sql = "DELETE FROM `expenses` WHERE id = $id";
$stmt = $connection->prepare($sql);
$stmt->execute();

$response = [];
$response[0]['status'] = 200;
header("Content-Type: JSON");
echo json_encode($response, JSON_PRETTY_PRINT);

?>