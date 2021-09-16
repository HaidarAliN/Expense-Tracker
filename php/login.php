<?php
include "connection.php";

if (isset($_POST["email"]) and $_POST["email"] !="")
	{
		$email = $_POST["email"];
	}else
	{
		die("Try again next time");
	}

if (isset($_POST["password"]) and $_POST["password"] !="")
	{
		$password = $_POST["password"];
	}else{
		die("Try again next time");
	}
$hash = hash('sha256', $password);
$sql1="Select * from users where email=? and password=?"; 
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("ss",$email,$hash);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
	session_start();
	$_SESSION["flash"] = "Please check your email and password";
	header('location: ../login.php');
}
else{
	session_start();
	$_SESSION["id"] = $row["id"];
	header('location: ../home.php');
}
?>