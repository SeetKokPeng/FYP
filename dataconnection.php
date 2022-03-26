<?php
$connect=mysqli_connect("localhost","root","","admin site");

if($connect)
{
	echo"Connect Successfully";
}
else
{
	die("Could not connect".mysql_error());
}
?>