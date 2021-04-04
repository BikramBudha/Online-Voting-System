<?php
require_once "DatabaseConnection.php";
session_start();
$USERNAME = $_SESSION["username"];
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
    <title>Collector Dashboard</title>
    <script>
    var username = "<?php echo $USERNAME; ?>"
    </script>
</head>
<body>
    <style>
        .container{
            padding: 10px;
            text-align: center;
        }
        .container2{
            padding: 10px;
            text-align: center;
        }
        </style>
    <div class="container">
        <h1>Choose the voting system you want to take part</h1>
    </div>
    <div class="container2">
        <h1>All available Voting system</h1>
        <a href="logout.php">Logout</a>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Voting system Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="user">
                    <?php
                        $sql = "select * from votingsystem where status = 0";
                        $result = mysqli_query($link, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $name = $row['name'];
                                echo "<tr><th scope='row'>'$id'</th><td>'$name'</td><td><a id='$id' hidden>$name</a> <a href='#' onClick='onApply(".$id.")'>Take Part</a></td></tr>";
                            }
                        } else {
                            echo "<h2>0 results</h2>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <script>
        function onApply(id){
            var name = document.getElementById(id).innerText
            var data1 ={
                        name : name,
                        username1:username
                        }
                        console.log(data1)
    var formdata = new FormData()
                            for(x in data1){
                                formdata.append(x,data1[x])
                            }
                            $.ajax(
      {
        url: 'http://localhost/votingsystem/addcollector.php',
        method:'POST',
        contentType:false,
        processData:false, // for all type files it should be false otherwise application/json
        data: formdata,   // JSON.stringify(data)
        dataType:'json',
        success: (data,status,jqxHR)=>{
            window.location.href = "thanks2.html"
        },
        error : (result)=>{
              
        }
      }
    )     
        }
        </script>
</body>
</html>