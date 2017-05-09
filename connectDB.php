<?php

$connect = mysqli_connect("localhost", "root", "", "projDB");

//Check if nagconnect sa Database
if (mysqli_connect_errno()) {
	echo "Failed to connect".mysqli_connect_errorno() ;
}else echo "connected";

?>