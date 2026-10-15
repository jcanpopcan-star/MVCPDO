<?php

    class EnlaceModel{
        public static function enlacesPaginasModel($enlace){
            if(isset($_SESSION['token'])){
                $sesion = true;
            }
            else{
                $sesion = false;
            }

            if($enlace == "login" || $enlace == "logout"){
                $modulo = "View/Modulos/Usuario/".$enlace.".php";
            }

            else if($enlace == "usuarios" && $sesion){
                $modulo = "View/Modulos/Usuario/".$enlace.".php";
            }

            else if($enlace == "registro" && $sesion){
                $modulo = "View/Modulos/Usuario/".$enlace.".php";
            }

            else{
                $modulo = "View/Modulos/inicio.php";
            }
            
            return $modulo;
        }
    }

?>