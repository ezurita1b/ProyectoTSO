
<?php
$conn = new mysqli("localhost", "dev_user", "DevTony#2026", "Papeleria_Tony");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
