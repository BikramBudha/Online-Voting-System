<?php
require_once "DatabaseConnection.php";
$id =  $_REQUEST['id'];
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$USERNAME = $_SESSION["username"];
$sql = "select name from votingsystem where id = '$id'"; 
$result = mysqli_query($link, $sql);
$name = '';
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Vote</title>
</head>
<body>
    <style>
    #heading{
        text-align:center;
        padding:10px;
    }
    #container{
        text-align:center;
        padding:10px;
    }
    </style>
    <script>
    var votingName = "<?php echo $name; ?>"
    var userName = "<?php echo $USERNAME; ?>"    
    </script>
    <div id="heading">
        <h1>Choose your candidate to vote</h1>
    </div>
    <div id="container">
        <?php
        $sql1 = "select * from collector_voting where votingname = '$name'";
        $result1 = mysqli_query($link, $sql1);
        if (mysqli_num_rows($result1) > 0) {
            while($row1 = mysqli_fetch_assoc($result1)) {
                $id = $row1['id'];
                $candidate = $row1['collectorname'];   
                echo "<a id=$id hidden>$candidate</a><button onClick='submitVote(".$id.")'>$candidate</button> <br><br><br>";
            }
        }
        ?>

        <script>
        function submitVote(id){
            var candidate = document.getElementById(id).innerText
            var data1 ={
                user : userName,
                candidate:candidate,
                votingsystem:votingName
                        }
                        console.log(data1)
    var formdata = new FormData()
                            for(x in data1){
                                formdata.append(x,data1[x])
                            }
                            $.ajax(
      {
        url: 'http://localhost/votingsystem/addvote.php',
        method:'POST',
        contentType:false,
        processData:false, // for all type files it should be false otherwise application/json
        data: formdata,   // JSON.stringify(data)
        dataType:'json',
        success: (data,status,jqxHR)=>{
            Bye(userName)
        },
        error : (result)=>{
              
        }
      }
    )     
      
        }

        function Bye(user){
            var data1 ={
                user : user
                        }
            var formdata = new FormData()
            for(x in data1){
                                formdata.append(x,data1[x])
                            }
                            $.ajax(
      {
        url: 'http://localhost/votingsystem/updateuser.php',
        method:'POST',
        contentType:false,
        processData:false, // for all type files it should be false otherwise application/json
        data: formdata,   // JSON.stringify(data)
        dataType:'json',
        success: (data,status,jqxHR)=>{
            window.location.href = "thanks.html"
        },
        error : (result)=>{
              
        }
      }
    )  
        }
        </script>
</div>
</body>
</html>