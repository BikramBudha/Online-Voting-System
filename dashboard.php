<?php
require_once "DatabaseConnection.php";
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$USERNAME = $_SESSION["username"];

$answer = $date = '';

if(!(empty($_GET["answer"]))){
	$answer = trim($_GET["answer"]);
	$date = $_GET["date"];
$sql = "INSERT INTO votes (user, name, date) VALUES (?, ?,?)";
    
	if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_user, $param_name, $param_date);

            $param_user = $USERNAME;
            $param_name = $answer;
            $param_date = $date;

		if(mysqli_stmt_execute($stmt)){
                header("location: data.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
}

}


?>

<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<style>
.Main_head{
	width:100%;
	background-color:grey;
}
.header_div{
	width:32%;
	margin: 0 auto;
}

.header_div a{
	font-family: 'Roboto', sans-serif;
	font-size:25px;
	text-decoration:none;
	margin-right:15px;
	color:white;
}
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="dashboard.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
	  <a class="nav-link" href="reset_password.php"> ChangePassword </a>
      </li>
      <li class="nav-item">
	  <a class="nav-link" href="logout.php">Logout </a>
      </li>
    </ul>
  </div>
</nav>
</div>
<style>
.how_to{
padding-left:80px;
}

.how{
	margin: 0 auto;	
	width:60%;
	height:200px;
}
.heading{
	text-align: center;
}
</style>

<div class="how_to">
 <h1 align="center">How to ?</h1>
<div class="how">
<img src="http://localhost/votingsystem/choose.png" width="100%" height="100%"/>
</div>
</div>
<div class="heading">
<h1 align="center">Choose Your Voting system to vote</h1>
<?php
$sql = "select * from votingsystem where status = 0";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$votingsytem = $row['name'];
		$id = $row['id'];
		echo "<a href='vote.php?id=".$id."'>$votingsytem</a> <br>";
	}
}
?>
</div>







