<?php 

include "../connection.php";
$id = $_POST['id'];
$user_id = $_POST['user_id'];
$date = $_POST['date'];
$name = $_POST['name'];
$amount = $_POST['amount'];

$sql2 = "SELECT id FROM `categories` WHERE user_id = $user_id and name = $name";
$stmt2 = $connection->prepare($sql2);
$stmt2->execute();
$result2 = $stmt2->get_result();
$row2 = $result2	-> fetch_assoc();
$cid = $row2['id'];

$sql = "UPDATE `expenses` SET `amount`= $amount, `category_id`= $cid, `date`=$date WHERE id = $id";
$stmt = $connection->prepare($sql);
$stmt->execute();

$response = [];
$response[0]['status'] = 200;
header("Content-Type: JSON");
echo json_encode($response, JSON_PRETTY_PRINT);

?>