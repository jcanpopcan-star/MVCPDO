<h1>Registro de usuarios</h1>

<form method="post">
    <p>Nombre</p>
    <input type="text" name="nombre" require placeholder="Ingresa tu nombre">

    <p>Apellido</p>
    <input type="text" name="apellido" require placeholder="Ingresa tu apellido">
    <br />
    <input type="text" name="usuario" require placeholder="Ingresa tu usuario">
    <br />
    <input type="text" name="password" require placeholder="Ingresa tu password">
    <br />
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
    <input type="submit" value="Enviar">


</form>

<?php 
    $registro = new UsuarioController();
    $registro->registroNuevoUsuario();
?>