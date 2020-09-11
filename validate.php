<?php
$host=$_POST['host'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$table=$_POST['table'];
$database=$_POST['database'];
$x=mysqli_connect($host,$user,$pass,$database);
if(!$x){
    echo "wrong details";
}
else{
    setcookie("host",$host);
    setcookie("user",$user);
    setcookie("pass",$pass);
    setcookie("table",$table);
    setcookie("database",$database);
    echo "<a href='export.php'><button style='color:white;' class='reset' target='_blank'>Download</a>";
}
?>
