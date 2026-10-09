<h1>Usuarios</h1>

<table>

    <thead>
        <tr>ID</tr>
        <tr>Nombre</tr>
        <tr>Apellido</tr>
    </thead>


    <tbody>
        <?php
            $usuarios = new UsuarioController();
            $usuarios->listarTodosUsuarios();
        ?>
    </tbody>

</table>