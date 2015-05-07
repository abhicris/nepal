<?php
//Give your mysql username password and database name

$con=mysql_connect("localhost","nepaluser","nepal123");

mysql_select_db("nepalcausedb",$con);

if($con)
echo "connnecteeeeeeeeeeeeed";
else 
echo "wrong connectiobnnbnnnnn";
session_start();
?>