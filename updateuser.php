<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require_once "DatabaseConnection.php";

$user = $_POST['user'];
$sql = "update users set status = 1 where username = '$user'";
if(mysqli_query($link,$sql)){
    echo json_encode("success");
 }

?>