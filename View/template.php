<h1>Bienvenido <?php
    if(isset($_SESSION['token'])){
        echo $_SESSION['nombre']." ".$_SESSION['apellido'];
    }
?></h1>

<ul>
    <li> <a href="index.php?action=inicio"> Inicio </a> </li>
    <?php if(isset($_SESSION['token'])){ echo "<li> <a href='index.php?action=usuarios'> Usuarios </a> </li>";  }?>
    <?php if(isset($_SESSION['token'])){ echo "<li> <a href='index.php?action=registro'> Registro </a> </li>";  }?>
    <li> <a href="index.php?action=login"> Login </a> </li>
    <?php if(isset($_SESSION['token'])){ echo "<li> <a href='index.php?action=logout'> Cerrar sesión </a> </li>";  }?>
</ul>

<?php

    $pagina = new PaginasController();
    $pagina->controlEnlacesPaginas();

?>

<h3>Sistema de lista de usuarios</h3>