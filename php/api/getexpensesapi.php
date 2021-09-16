<?php 

include "../connection.php";
$index=0;
$response = [];
$user_id = $_POST["id"];
$sql = "Select e.id, e.date, e.amount, c.name from expenses as e, categories as c where e.user_id = $user_id and  e.category_id = c.id";
$stmt = $connection->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result	-> fetch_assoc();
if(empty($row)){
    $response['status'] = 400;
    header("Content-Type: JSON");
    echo json_encode($response, JSON_PRETTY_PRINT);
}else{

    do{
        $response[$index]['id'] = $row['id'];
        $response[$index]['name'] = $row['name'];
        $response[$index]['amount'] = $row['amount'];
        $response[$index]['date'] = $row['date'];
        $index++;
        }while($row = $result	-> fetch_assoc());
    header("Content-Type: JSON");
    echo json_encode($response, JSON_PRETTY_PRINT);
}
?>


