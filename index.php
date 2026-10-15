<?php
    session_start();

    require_once("Model\EnlaceModel.php");
    require_once("Model\UsuarioModel.php");
    require_once("Controller\PaginasController.php");
    require_once("Controller\UsuarioController.php");

    $pagina = new PaginasController();
    $pagina->setPagina();
?>