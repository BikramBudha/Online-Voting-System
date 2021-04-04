<?php
require_once "DatabaseConnection.php";

$id = $_REQUEST['id'];

$sql = "Update votingsystem set status=1 where id ='$id'";
if(mysqli_query($link,$sql)){
    ?>
    <script>
    alert("voting system terminated!")
    window.location.href = "admindashboard.php"
    </script>
    <?php
 }
 mysqli_close($link);

?>