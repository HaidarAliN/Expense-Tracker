<?php 

include "../connection.php";
$index=0;
$response = [];
$user_id = $_POST['user_id'];

$sql = "SELECT c.name, sum(e.amount) as amounts FROM expenses as e, categories as c WHERE e.user_id = $user_id and e.category_id = c.id group by e.category_id";
$stmt = $connection->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result	-> fetch_assoc()){
	$response[$index]['category'] = $row['name'];
	$response[$index]['amount'] = $row['amounts'];
	$index++;
}
header("Content-Type: JSON");
echo json_encode($response, JSON_PRETTY_PRINT);
?>