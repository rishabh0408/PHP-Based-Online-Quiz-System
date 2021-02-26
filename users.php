<?php
session_start();
class users
{
public $host="localhost";
public $username="root";
public $pass="";
public $db_name="quiz";
public $conn;
public $data;
public $cat;
public $qus;
public function __construct()
{
$this->conn=new mysqli($this->host,$this->username,$this->pass,$this->db_name);
if($this->conn->connect_errno)
{
die("Database connection failed ".$this->conn->connect_errno);
}
}
public function sign($data)
{
$this->conn->query($data);
return true;
}
public function signin($email,$password)
{
$query=$this->conn->query("select email,pass from sign_up where email='$email' and pass='$password'");
$query->fetch_array(MYSQLI_ASSOC);
if($query->num_rows>0)
{
$_SESSION['email']=$email;
return true;
}
else
return false;
}
public function add_q($data)
{
$this->conn->query($data);
return true;
}
public function add_c($data)
{
$this->conn->query($data);
return true;
}
public function users_profile($email)
{
$query=$this->conn->query("select * from sign_up where email='$email'");
$row=$query->fetch_array(MYSQLI_ASSOC);
if($query->num_rows>0)
{
$this->data[]=$row;
}
return $this->data;
}
public function cat_shows()
{
$query=$this->conn->query("select * from category");
while($row=$query->fetch_array(MYSQLI_ASSOC))
{
$this->cat[]=$row;
}
return $this->cat;
}
public function qus_show($qus)
{
$query=$this->conn->query("select * from questions where cat_id='$qus'");
while($row=$query->fetch_array(MYSQLI_ASSOC))
{
$this->qus[]=$row;
}
return $this->qus;
}
public function answer($data)
{
$ans=implode("",$data);
$right=0;
$wrong=0;
$no_ans=0;
$query=$this->conn->query("select id,ans from questions where cat_id='".$_SESSION['cat']."'");
while($qust=$query->fetch_array(MYSQLI_ASSOC))
{
if($qust['ans']==$_POST[$qust['id']])
{
$right++;
}
elseif($_POST[$qust['id']]==4)
{
$no_ans++;
}
else
$wrong++;
}
$array=array();
$array['right']=$right;
$array['wrong']=$wrong;
$array['no_ans']=$no_ans;
return $array;
}
public function admin_in($email,$password)
{
$query=$this->conn->query("select email,pass from admin where email='$email' and pass='$password'");
$query->fetch_array(MYSQLI_ASSOC);
if($query->num_rows>0)
{
$_SESSION['email']=$email;
return true;
}
else
return false;
}
public function url($url)
{
header("location:".$url);
}
public function save($m,$e,$c)
{
$query=$this->conn->query("select p_id from sign_up where email='$e'");
while($q=$query->fetch_assoc())
{
echo $q['p_id'];
}
}
}
new users;
?>