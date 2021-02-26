<?php
    include("users.php");
	$addc=new users;
    extract($_POST);
	$query="insert into category values('','$cat')";
    if($addc->add_c($query))
    {
        $addc->url("admin.php");
    }
	else
    {
        $addc->url("admin.php?run=failed");
    }
?>