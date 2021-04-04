                                                                                                                                                                                                                                                                                                                            <?php
require_once "DatabaseConnection.php";
$votingname = $_POST['votingname'];
$sql = "insert into votingsystem(name) values('$votingname')";
if(mysqli_query($link,$sql)){
    ?>
    <script>
    alert("voting system added!")
    window.location.href = "admindashboard.php"
    </script>
    <?php
 }
 mysqli_close($link);
?>