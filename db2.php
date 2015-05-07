<?php
//Give your mysql username password and database name

$con=mysql_connect("localhost","nepal_user","nepalpass123");

mysql_select_db("nepal_db",$con);

if($con)
echo "connnecteeeeeeeeeeeeed";
else 
echo "wrong connectiobnnbnnnnn";
session_start();
?>