<?php
session_start();

if($_POST){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if($user == "23161182@itoaxaca.edu.mx" && $pass == "23161182TSO"){
        $_SESSION['login'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Datos incorrectos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>Papelería Tony</h1>
</header>

<nav>
    <a href="index.php">Inicio</a>
</nav>

<div class="container">

<h2>Login Administrador</h2>

<?php if(isset($error)){ echo "<p style='color:red;'>$error</p>"; } ?>

<form method="POST">
<input name="user" placeholder="Usuario" required><br><br>
<input type="password" name="pass" placeholder="Contraseña" required><br><br>
<button>Entrar</button>
</form>

</div>

<footer>
<p>© 2026 Papelería Tony</p>
</footer>

</body>
</html>
