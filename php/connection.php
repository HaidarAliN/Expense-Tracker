<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "expensedb";

$connection = new mysqli($server, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Failed");
}
