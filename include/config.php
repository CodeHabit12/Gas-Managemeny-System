<?php

$server='localhost';
$password='';
$username='root';
$dbname='Gas';

$conn=mysqli_connect($server,$username,$password,$dbname);

if($conn){
	
}
else{
	echo "Connection failed.";
}


?>