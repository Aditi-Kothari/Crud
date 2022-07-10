<?php
//connection to database
$servername="localhost";
$username="root";
$password="";
$database="crud_db";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Connection Failed : " .mysqli_connect_error());
}


?>