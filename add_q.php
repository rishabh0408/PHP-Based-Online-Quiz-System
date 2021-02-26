<?php
    include("users.php");
	$add=new users;
    extract($_POST);
	$query="insert into questions values('','$q','$o1','$o2','$o3','$o4','$ans','$cat')";
    if($add->add_q($query))
    {
        $add->url("admin.php");
    }
	else
    {
        $add->url("admin.php?run=failed");
    }
?>