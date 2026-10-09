<?php

    require_once("Conexion.php");

    class UsuarioModel extends Conexion{

        public static function listadoUsuarios(){
            $stmt = Conexion::Conectar()->prepare("SELECT * FROM Usuario");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        public static function guardarUsuario($datos){
          $stmt = Conexion::Conectar()->prepare("INSERT INTO Usuario (nombre,apellido) VALUES(:nombre,:apellido)");
          $stmt->bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
          $stmt->bindParam(":apellido",$datos['apellido'],PDO::PARAM_STR);

          if($stmt->execute()){
            return "exito";
          }else{
            return "error";
          }
        }

    }

?>