<?php
    include("users.php");
    $email=$_SESSION['email'];
    $profile=new users;
    $profile->users_profile($email);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>| Online Quiz System |</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="icon" type="image/png" href="https://c7.uihere.com/files/895/949/319/quiz-logo-game-art-quiz-time-thumb.jpg">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
        <style>
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: black;
                padding: 15px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-inverse" style="background-color: black">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php">
                        <span style="color: white;font-weight: bolder">Online Quiz System</span>
                    </a>
                </div>
                <p class="navbar-text navbar-right" style="padding-right: 15px"><img style="border-radius: 50%" src="img/<?php foreach ($profile->data as $prof){echo $prof['img'];}?>" alt="" width="35px" height="35px">
                    &nbsp;&nbsp;&nbsp;
                    <a href="logout.php" class="navbar-link btn btn-info" style="text-decoration: none;font-weight: bold;color: white">LogOut</a>
                </p>
            </div>
        </nav>
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li><a data-toggle="tab" href="#profile">Profile</a></li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>HOME</h3>
                    <center><button type="button" class="btn btn-primary" data-toggle="tab" href="#select">Select Category</button></center>
                    <br>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div id="select" class="tab-pane fade">
                            <form action="qus_show.php" method="post">
                                <select class="form-control" id="sel1" name="cat">
                                    <option disabled>Select Category</option>
                                    <?php
                                    $profile->cat_shows();
                                    foreach ($profile->cat as $category)
                                    {?>
                                    <option value="<?php echo $category['id'];?>"><?php echo $category['cat_name'];?></option>
                                    <?php } ?>
                                </select>
                                <br>
                                <center><input type="submit" value="submit" class="btn btn-primary"></center>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="profile" class="tab-pane fade">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <br><br><br>
                                <img style="border-radius: 50%" src="img/<?php foreach ($profile->data as $prof){echo $prof['img'];}?>" alt="" width="200px" height="200px">
                            </div>
                            <div class="col-sm-3">
                                <br><br><br><br><br>
                                <h2 style="color: cornflowerblue;font-weight: bold;font-size: large;">User ID : <span><?php foreach($profile->data as $prof) {echo $prof['id'];}?></span></h2>
                                <h2 style="color: cornflowerblue;font-weight: bold;font-size: large;">User Name : <span><?php foreach($profile->data as $prof) {echo $prof['name'];}?></span></h2>
                                <h2 style="color: cornflowerblue;font-weight: bold;font-size: large;">User Email : <span><?php foreach($profile->data as $prof) {echo $prof['email'];}?></span></h2>
                            </div>
                            <div class="col-sm-6">
                                <h2 style="color: cornflowerblue;font-weight: bold;font-size: large;text-align: center">Your Performance Analysis</h2>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <a href="about.php" class="btn btn-info">About the Quiz</a>
            <span style="font-weight: bolder;color: white;padding-left: 430px;">Made with <span style="color: red"><i class="far fa-heart"></i></span> for VITians</span>
            <span style="font-weight: bolder;color: white;padding-left: 300px;">&copy 2020 RISHABH KANSAL</span>
        </div>
    </body>
</html>