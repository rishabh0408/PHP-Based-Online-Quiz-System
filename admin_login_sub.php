<?php
include("users.php");
$admin=new users;
extract($_POST);
if($admin->admin_in($e,$p))
{
    $admin->url("admin.php");
}
else
{
    $admin->url("admin_login.php?run=failed");
}
?>