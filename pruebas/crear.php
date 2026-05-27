<?php session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}

include("conexion.php");

if($_POST){
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO articulos (nombre, precio, stock)
            VALUES ('$nombre', '$precio', '$stock')";

    if($conn->query($sql)){
        header("Location: admin.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Agregar</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
<h1>Papelería Tony</h1>
</header>

<nav>
<a href="admin.php">Dashboard</a>
</nav>

<div class="container">

<h2>Agregar Artículo</h2>

<div class="form-box">
<form method="POST">
<input name="nombre" placeholder="Nombre" required>
<input name="precio" placeholder="Precio" required>
<input name="stock" placeholder="Stock" required>
<br>
<button>Guardar</button>
</form>
</div>

</div>

<footer>
<p>© 2026 Papelería Tony</p>
</footer>

</body>
</html>
