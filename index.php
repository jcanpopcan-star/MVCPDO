<?php
    session_start();

    if(empty($_SESSION['token']) ){
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }

    require_once("Model\EnlaceModel.php");
    require_once("Model\UsuarioModel.php");
    require_once("Controller\PaginasController.php");
    require_once("Controller\UsuarioController.php");

    $pagina = new PaginasController();
    $pagina->setPagina();
?>