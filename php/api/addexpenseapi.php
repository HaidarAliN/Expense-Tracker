<?php 

include "../connection.php";
$name = $_POST['name'];
$user_id = $_POST['user_id'];
$amount = $_POST['amount'];
$date = $_POST['date'];

$sql = "SELECT id FROM `categories` WHERE user_id = $user_id and name = $name";
$stmt = $connection->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$row = $result	-> fetch_assoc();

if(empty($row)){
    $sql3 = "INSERT INTO `categories` (`name`, `user_id`) VALUES ($name,$user_id)";
    $stmt3 = $connection->prepare($sql3);
    $stmt3->execute();

    $sql4 = "SELECT id FROM `categories` WHERE user_id = $user_id and name = $name";
    $stmt4 = $connection->prepare($sql4);
    $stmt4->execute();
    $result4 = $stmt4->get_result();
    $row4 = $result4	-> fetch_assoc();
    $cid = $row4['id'];
}else{
    $cid = $row['id'];
}
    $sql2 = "INSERT INTO `expenses`(`amount`, `category_id`, `date`, `user_id`) VALUES ($amount,$cid,$date,$user_id)";
    $stmt2 = $connection->prepare($sql2);
    $stmt2->execute();

    $sql5 = "SELECT id FROM `expenses` order by id desc limit 1";
    $stmt5 = $connection->prepare($sql5);
    $stmt5->execute();
    $result5 = $stmt5->get_result();
    $row5 = $result5	-> fetch_assoc();
    $eid = $row5['id'];

    $response = [];
    $response[0]['status'] = 200;
    $response[0]['id'] = $eid;
    header("Content-Type: JSON");
    echo json_encode($response, JSON_PRETTY_PRINT);

?>