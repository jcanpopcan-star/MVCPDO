<h1>Login</h1>

<form method="post">
    <p>Usuario</p>
    <input type="text" name="user" require placeholder="Ingresa tu usuario">

    <p>Contraseña</p>

    <input type="password" name="password" require placeholder="Ingresa tu Contraseña">
    <br />
    
    <input type="submit" value="Iniciar sesión">


</form>

<?php 

    $login = new UsuarioController();
    $login->login();

?>