<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit();
}

include("conexion.php");

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM articulos WHERE id=$id");
$row = $result->fetch_assoc();

if($_POST){
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $sql = "UPDATE articulos 
            SET nombre='$nombre', precio='$precio', stock='$stock' 
            WHERE id=$id";

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
<title>Editar</title>
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

<h2>Editar Artículo</h2>

<div class="form-box">
<form method="POST">
<input name="nombre" value="<?php echo $row['nombre']; ?>">
<input name="precio" value="<?php echo $row['precio']; ?>">
<input name="stock" value="<?php echo $row['stock']; ?>">
<br>
<button>Actualizar</button>
</form>
</div>

</div>

<footer>
<p>© 2026 Papelería Tony</p>
</footer>

</body>
</html>
