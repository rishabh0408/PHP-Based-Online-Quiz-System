<?php
    include("users.php");
    $ans=new users;
    $answer=$ans->answer($_POST);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/png" href="https://c7.uihere.com/files/895/949/319/quiz-logo-game-art-quiz-time-thumb.jpg">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>| Online Quiz System |</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php">
                        <span style="color: white;font-weight: bolder">Online Quiz System</span>
                    </a>
                </div>
                <p class="navbar-text navbar-right" style="padding-right: 15px"><a href="logout.php" class="navbar-link btn btn-info" style="text-decoration: none;font-weight: bold;color: white">LogOut</a></p>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <center>
                        <?php
                        $total_qus=$answer['right']+$answer['wrong']+$answer['no_ans'];
                        $attempt=$answer['right']+$answer['wrong'];
                        $right=$answer['right'];
                        $wrong=$answer['wrong'];
                        ?>
                        <h2>Your Result</h2>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Total Number of Questions</th>
                                <th><?php echo $total_qus;?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Attempted Questions</td>
                                <td><?php echo $attempt?></td>
                            </tr>
                            <tr>
                                <td>Rightly Answered</td>
                                <td><?php echo $right;?></td>
                            </tr>
                            <tr>
                                <td>Wrongly Answered</td>
                                <td><?php echo $wrong;?></td>
                            </tr>
                            <tr>
                                <td>Percentage Accuracy</td>
                                <td><?php echo ($right*100)/$total_qus;?>%</td>
                            </tr>
                            </tbody>
                        </table>
                    </center>
                </div>
                <div class="col-sm-5">
                    <script type="text/javascript">
                        google.charts.load("current", {packages:['corechart']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ["Accurate", "Score", { role: "style" } ],
                                ["Right", <?php echo $right;?>, "#b87333"],
                                ["Wrong", <?php echo $wrong;?>, "silver"],
                                ["Accuracy", <?php echo ($right*100)/$total_qus;?>, "gold"]
                            ]);
                            var view = new google.visualization.DataView(data);
                            view.setColumns([0, 1,
                                { calc: "stringify",
                                    sourceColumn: 1,
                                    type: "string",
                                    role: "annotation" },
                                2]);
                            var options = {
                                title: "Your Performance",
                                width: 450,
                                height: 300,
                                bar: {groupWidth: "95%"},
                                legend: { position: "none" },
                            };
                            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                            chart.draw(view, options);
                        }
                    </script>
                    <div id="columnchart_values" style="width: 525px; height: 300px;"></div>
                </div>
            </div>
        </div>
        <br>
        <center><a class="btn btn-warning" href="home.php">Go Back to Home Page</a></center>
    </body>
</html>