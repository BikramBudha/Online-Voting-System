<?php
require_once "DatabaseConnection.php";
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
    <title>Admin Dashboard</title>
    <style>
    .container{
        padding: 10px;
        text-align: center;
    }
    .container2{
        padding: 10px;
        text-align: center;
    }
    .logout{
        padding:10px;
        text-align: end;
    }
    </style>
</head>
<body>
    <div class="logout">
    <a href="adminlogin.php" id="logout">Log out</a>
</div>
    <div class="container">
        <h1>Add Voting system</h1>
        <form action="addvoting.php" method="post">
            <input type="text" name="votingname" placeholder="Name for the system">
            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="container2">
    <h1>View Voting system</h1>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Voting system Name</th>
                <th scope="col">Action</th>
                <th scope="col">View</th>
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
                            echo "<tr><th scope='row'>'$id'</th><td>'$name'</td><td><a href='#' onClick='onTerminate(".$id.")'>Terminate</a><td><a id=$id hidden>$name</a><a href='#' onClick='onView(".$id.")'>View</a></td></tr>";
                        }
                    } else {
                        echo "<h2>0 results</h2>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function onTerminate(id){
            $.get( "http://localhost/votingsystem/deletevote.php?id="+id, function( data ) {
                window.location.href = "admindashboard.php"
            })
        }
        function onView(id){
            var name = document.getElementById(id).innerText
            window.location.href = "view1.php?id="+name
        }
    </script>
</body>
</html>