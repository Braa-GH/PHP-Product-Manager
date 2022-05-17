<?php
require_once "DBConnector.php";
$id = $_GET['id'];
$query = "DELETE FROM Product WHERE id = $id";
if ($connection->query($query)){
    header('Location:get.php');
}
