<?php
$servername="localhost:3306";
$username="root";
$password="Kotianvibha@4";
$dbname="house_rental";

$conn= mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
	die("Conection failed because".mysqli_connect_error());
}
?>