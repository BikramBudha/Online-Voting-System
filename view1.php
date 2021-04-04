<?php
require_once('DatabaseConnection.php');

$id = $_REQUEST['id'];

$sql2 = "SELECT COUNT(*) as 'cnt' FROM votes where votingsystem = '$id'";
$HighestCount = $LowestCount = 0;
if($result1 = mysqli_query($link, $sql2)){
if(mysqli_num_rows($result1) > 0){
$row1 = mysqli_fetch_array($result1);
$HighestCount =$row1['cnt'];
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <script>
    data = []
    freq = []
    </script>
<?php
$sql  = "Select DISTINCT candidate from votes where votingsystem = '$id'";
$result = mysqli_query($link, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <script>
                                data.push("<?php echo $row['candidate']; ?>")
                            </script>
                       <?php
                        $sql3 = "select count(*) as 'cnt' from votes where candidate = '".$row['candidate']."'";
                        if($result3 = mysqli_query($link, $sql3)){
                            if(mysqli_num_rows($result3) > 0){
                                $row3 = mysqli_fetch_array($result3); 
                                ?>
                                <script>
                                    freq.push("<?php echo $row3['cnt']; ?>")
                                </script>
                           <?php
                            }
                        }




                    }
                    }
?>
    <canvas id="myChart" width="100px" height="30"></canvas>
    <script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: data,
        datasets: [{
            label: '# of Votes',
            data: freq,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
</body>
</html>