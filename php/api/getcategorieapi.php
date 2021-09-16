<?php 

include "../connection.php";
$index=0;
$response = [];
 
$id = $_POST["id"];
$sql2="Select * from categories where user_id=$id"; #Check if the email already exists in the database
$stmt2 = $connection->prepare($sql2);
$stmt2->execute();
$result2 = $stmt2->get_result();
$row = $result2	-> fetch_assoc();
if(empty($row)){
    $response['status'] = 400;
    header("Content-Type: JSON");
     echo json_encode($response, JSON_PRETTY_PRINT);
}else{
        
    do{
        $response[$index]['categorie'] = $row['name'];
        $index++;
        }while($row = $result2	-> fetch_assoc());
    header("Content-Type: JSON");
    echo json_encode($response, JSON_PRETTY_PRINT);
}


?>