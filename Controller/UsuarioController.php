<?php

    class UsuarioController{
        public function listarTodosUsuarios(){
            $usuarios = UsuarioModel::listadoUsuarios();

            foreach($usuarios as $fila => $item){
                echo "
                    <tr>
                        <td>".$item["idUsuario"]."</td>
                        <td>".$item["nombre"]."</td>
                        <td>".$item["apellido"]."</td>
                    </tr>
                ";
            }
        }

        public function registroNuevoUsuario(){ //Revisar los espacios en blanco y las tíldes
            if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['usuario']) && isset($_POST['password']) && isset($_SESSION['token'])){
                if( preg_match('/^[a-zA-Z]+$/',$_POST["nombre"]) &&
                    preg_match('/^[a-zA-Z]+$/',$_POST["apellido"]) &&
                    preg_match('/^[a-zA-Z]+$/',$_POST["usuario"]) &&
                    preg_match('/^[a-zA-Z]+$/',$_POST["password"]) &&
                    hash_equals($_SESSION['token'],$_POST['token'])
                ){

                    $datos = array(
                        "nombre" => $_POST['nombre'],
                        "apellido" => $_POST['apellido'],
                        "usuario" => $_POST['usuario'],
                        "password" => $_POST['password']
                    );

                    $respuestaModeloUsuario = UsuarioModel::guardarUsuario($datos);

                    if($respuestaModeloUsuario="exito"){
                        echo "Guardado correctamente";
                    }
                    else if($respuestaModeloUsuario="error"){
                        echo "Error al guardar";
                    }
                }
                else{
                    echo "datos invalidos";
                }

            }
        }

        public function login(){
            if(isset($_POST['user']) && isset($_POST['password']) ){

                $datos = array(
                    "user" => $_POST['user'],
                    "password" => $_POST['password']
                );
                
                $respuestaModelo = UsuarioModel::login($datos);

                
                if(sizeof($respuestaModelo)>0){ //Si el nombre de usuario existe

                    //Validar contraseña
                    foreach($respuestaModelo as $user){
                        $passBD = $user['password'];
                    }
                    $resultadoComparacion = password_verify($datos['password'],$passBD);

                    if($resultadoComparacion){//Si coincidió la contraseña del form con la BD
                        session_regenerate_id();
                        $_SESSION['token'] = bin2hex(random_bytes(32));
                        
                        foreach($respuestaModelo as $user){
                            $_SESSION['nombre'] = $user['nombre'];
                            $_SESSION['apellido'] = $user['apellido'];
                        }

                        header("Location:index.php?action=inicio");
                    }

                }
                else{
                    echo "Error al iniciar sesión";
                }
            }
        }

    }

?>