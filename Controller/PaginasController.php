<?php

    class PaginasController{
        public function setPagina(){
            include "View/template.php";
        }

        public function controlEnlacesPaginas(){
            //Falta mejorar la limpieza de action
            if( isset($_GET['action']) ){
                $enlace = $_GET['action'];
            }
            else{
                $enlace = "inicio";
            }

            $respuesta = EnlaceModel::enlacesPaginasModel($enlace);
            include $respuesta;
        }
    }

?>