<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require_once "DatabaseConnection.php";
$votingname = $_POST['name'];
$username = $_POST['username1'];
$sql = "insert into collector_voting(votingname,collectorname) values('$votingname','$username')";
if(mysqli_query($link,$sql)){
    echo json_encode("done");
 }
 mysqli_close($link);

?>