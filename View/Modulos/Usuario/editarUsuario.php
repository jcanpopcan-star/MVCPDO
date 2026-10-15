

<?php
$mostrarUsuario = new UsuarioController();
$datosUsuario = $mostrarUsuario->editarUsuario($_REQUEST['idUsuario']);
$Nombre = $datosUsuario['Nombre'];
$Apellido = $datosUsuario['Apellido'];
$Usuario = $datosUsuario['Usuario'];
$Password = $datosUsuario['Password'];

?>

<form method="post">
    <p>Nombre</p>
    <input type="text" name="nombre" require value="<?php echo $Nombre; ?>">

    <p>Apellido</p>
    <input type="text" name="apellido" require value="<?php echo $Apellido; ?>">
    <br />
    <input type="text" name="usuario" require value="<?php echo $Usuario; ?>">
    <br />
    <input type="text" name="password" require value="<?php echo $Password; ?>">
    <br />
    <input type="hidden" name="idUsuario" value="<?php echo $_REQUEST['idUsuario']; ?>">
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <input type="submit" value="Actualizar">


</form>

<?php

    $mostrarUsuario->actualizarUsuario();

?>