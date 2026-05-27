<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    echo "Entrando a admin.php";
?>
<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}

include("conexion.php");

$result = $conn->query("SELECT * FROM articulos");

if (!$result) {
    die("Error en la consulta: " . $conn->error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Papelería Tony</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>Papelería Tony</h1>
</header>

<nav>
    <a href="index.php">Inicio</a>
    <a href="admin.php">Dashboard</a>
    <a href="login.php">Cerrar sesión</a>
</nav>

<div class="container">

<h2>Gestión de Artículos</h2>

<a href="crear.php">Agregar nuevo</a>

<br><br>

<table>
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Acciones</th>
</tr>

<?php
while($row = $result->fetch_assoc()){
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['nombre']}</td>
        <td>{$row['precio']}</td>
        <td>{$row['stock']}</td>
        <td>
            <a href='editar.php?id={$row['id']}'>Editar</a>
            <a href='eliminar.php?id={$row['id']}' onclick=\"return confirm('¿Seguro que quieres eliminar?')\">Eliminar</a>
        </td>
    </tr>";
}
?>

</table>

</div>

<footer>
<p>© 2026 Papelería Tony - Oaxaca</p>
</footer>

</body>
</html>
