<?php

    class EnlaceModel{
        public static function enlacesPaginasModel($enlace){
            if($enlace == "usuarios" || $enlace == "registro"){
                $modulo = "View/Modulos/Usuario/".$enlace.".php";
            }

            else{
                $modulo = "View/Modulos/inicio.php";
            }
            
            return $modulo;
        }
    }

?>