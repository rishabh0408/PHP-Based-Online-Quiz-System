<?php
    include("users.php");
    $qus=new users;
    $cat=$_POST['cat'];
    $qus->qus_show($cat);
    $_SESSION['cat']=$cat;
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="https://c7.uihere.com/files/895/949/319/quiz-logo-game-art-quiz-time-thumb.jpg">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            function timeOut()
            {
                var minute=Math.floor(timeLeft/60)
                var second=timeLeft%60
                if(timeLeft<=0)
                {
                    clearTimeout(tm)
                    document.getElementById("form1").submit();
                }
                else
                {
                    if(minute<10)
                    {
                        minute="0"+minute;
                    }
                    if(second<10)
                    {
                        second="0"+second;
                    }
                    document.getElementById("time").innerHTML=minute+" : "+second;
                }
                timeLeft--;
                var tm=setTimeout(function(){timeOut()},1000)
            }
        </script>
    </head>
    <body onload="timeOut()">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php">
                        <span style="color: white;font-weight: bolder">Online Quiz System</span>
                    </a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h2>Quiz
                    <div id="time" style="float: right;"></div>
                </h2>
                <form action="answer.php" method="post" id="form1">
                    <?php
                        $i=1;
                        foreach ($qus->qus as $question)
                        {
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="danger">
                                <th><?php echo $i.'.&nbsp';?><?php echo $question['question'];?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($question['option1'])){?>
                            <tr class="info">
                                <td>1:&nbsp<input type="radio" value="0" name="<?php echo $question['id'];?>">&nbsp<?php echo $question['option1'];?></td>
                            </tr>
                            <?php }?>
                            <?php if(isset($question['option2'])){?>
                            <tr class="info">
                                <td>2:&nbsp<input type="radio" value="1" name="<?php echo $question['id'];?>">&nbsp<?php echo $question['option2'];?></td>
                            </tr>
                            <?php }?>
                            <?php if(isset($question['option3'])){?>
                            <tr class="info">
                                <td>3:&nbsp<input type="radio" value="2" name="<?php echo $question['id'];?>">&nbsp<?php echo $question['option3'];?></td>
                            </tr>
                            <?php }?>
                            <?php if(isset($question['option4'])){?>
                            <tr class="info">
                                <td>4:&nbsp<input type="radio" value="3" name="<?php echo $question['id'];?>">&nbsp<?php echo $question['option4'];?></td>
                            </tr>
                            <?php }?>
                            <tr class="info" style="display: none;">
                                <td><input checked="checked" type="radio" value="4" name="<?php echo $question['id'];?>"></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php $i++; }?>
					<script type="text/javascript">
                        var timeLeft=<?php echo $i-1;?>*60;
                    </script>
                    <center><input type="submit" value="Submit Quiz" class="btn btn-success"></center>
                </form>
                <br>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </body>
</html>