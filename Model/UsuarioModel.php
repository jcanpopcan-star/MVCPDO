<?php

    require_once("Conexion.php");

    class UsuarioModel extends Conexion{

        public static function listadoUsuarios(){
            $stmt = Conexion::Conectar()->prepare("SELECT * FROM Usuario");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        public static function guardarUsuario($datos){
          $stmt = Conexion::Conectar()->prepare("INSERT INTO Usuario (nombre,apellido,user,password) VALUES(:nombre,:apellido,:user,:password)");
          $stmt->bindParam(":user",$datos['usuario'],PDO::PARAM_STR);
          $stmt->bindParam(":nombre",$datos['nombre'],PDO::PARAM_STR);
          $stmt->bindParam(":apellido",$datos['apellido'],PDO::PARAM_STR);
          //contraseña
          $passCifrado = password_hash($datos['password'],PASSWORD_DEFAULT);
          $stmt->bindParam(":password",$passCifrado,PDO::PARAM_STR);

          if($stmt->execute()){
            return "exito";
          }else{
            return "error";
          }
        }

        public static function login($datos){
          $stmt = Conexion::Conectar()->prepare("SELECT * FROM Usuario WHERE user=:user");
          $stmt->bindParam(":user",$datos['user'],PDO::PARAM_STR);
          $stmt->execute();

          //$resultadoComparacion = password_verify($datos['password'],$passBD);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
          
        }

        public static function buscarUsuarioId(int $idUsuario){
          $stmt = Conexion::Conectar()->prepare("SELECT * FROM Usuario WHERE idusuario=:user");
          $stmt->bindParam(":user",$idUsuario,PDO::PARAM_INT);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function actualizarUsuario($datos){
          $stmt = Conexion::Conectar()->prepare("UPDATE usuario 
          SET nombre=:nombre2, apellido=:apellido2, user=:user2, password=:password2
          WHERE idusuario = :idusuario2 ");
print_r($datos);
          $stmt->bindParam(":nombre2",$datos['nombre'],PDO::PARAM_STR);
          $stmt->bindParam(":apellido2",$datos['apellido'],PDO::PARAM_STR);
          $stmt->bindParam(":user2",$datos['usuario'],PDO::PARAM_STR);
          
          $passCifrado = password_hash($datos['password'],PASSWORD_DEFAULT);
          $stmt->bindParam(":password2",$passCifrado,PDO::PARAM_STR);
          $stmt->bindParam(":idusuario2",$datos['idUsuario'],PDO::PARAM_INT);

          if($stmt->execute()){
            return "exito";
          }else{
            return "error";
          }
        }

    }

?>