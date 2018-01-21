<?php
$con=mysql_connect("localhost","root","password") or die("connection error") ;
mysql_select_db('dbms') or die("db error");

if($con==true)
{
    echo "Success";
}
else
{
    mysql_close($con);
}
?>



