<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require_once "DatabaseConnection.php";
$user = $_POST['user'];
$candidate = $_POST['candidate'];
$votingsystem = $_POST['votingsystem'];

$sql = "insert into votes(user,candidate,votingsystem) values('$user','$candidate','$votingsystem')";
if(mysqli_query($link,$sql)){
    echo json_encode("done");
 }
 mysqli_close($link);

?>