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
            if(isset($_POST['nombre']) && isset($_POST['apellido']) && $_SESSION['token']){
                if( preg_match('/^[a-zA-Z]+$/',$_POST["nombre"]) &&
                    preg_match('/^[a-zA-Z]+$/',$_POST["apellido"]) &&
                    hash_equals($_SESSION['token'],$_POST['token'])
                ){

                    $datos = array(
                        "nombre" => $_POST['nombre'],
                        "apellido" => $_POST['apellido']
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
    }

?>