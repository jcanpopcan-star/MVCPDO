<?php

    class Conexion{

        public static function Conectar(){
              $conexion = new PDO("mysql:host=localhost;dbname=tiendaestrella","root","");
              return $conexion;
        }

    }

?>