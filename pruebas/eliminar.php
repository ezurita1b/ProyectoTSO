<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}

include("conexion.php");

$id = $_GET['id'];

$sql = "DELETE FROM articulos WHERE id=$id";

if($conn->query($sql)){
    header("Location: admin.php");
} else {
    echo "Error: " . $conn->error;
}
?>
