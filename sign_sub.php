  
<?php
    include("users.php");
    $register=new users;
    extract($_POST);
    $img_name=$_FILES['img']['name'];
    $tmp_name=$_FILES['img']['tmp_name'];
    move_uploaded_file($tmp_name,"img/".$img_name);
    $query="insert into sign_up values('','$n','$e','$p','$img_name')";
    if($register->sign($query))
    {
        $register->url("index.php?run=success");
    }
  ?>