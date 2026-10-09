<h1>Encabezado</h1>

<ul>
    <li> <a href="index.php?action=inicio"> Inicio </a> </li>
    <li> <a href="index.php?action=usuarios"> Usuarios </a> </li>
    <li> <a href="index.php?action=registro"> Registro </a> </li>
</ul>

<?php

    $pagina = new PaginasController();
    $pagina->controlEnlacesPaginas();

?>

<h3>Sistema de lista de usuarios</h3>