<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ProductManagerDb";

$connection = new mysqli($servername,$username,$password,$dbname);
if (mysqli_connect_error()){
    die("Database connection error: " . mysqli_connect_error());
}

