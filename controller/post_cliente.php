
<?php 
    include('../model/conexion.php');
    $regexTelefono = '/^9[0-9]{8}/';
    $errores = "";
    $nombres_b = '';
    $correo_b = '';
    $categoria_b = '';
    $telefono_b = '';
        if(empty($_POST['name_user'])){ 
            $errores .= "Debes ingresar el nombre del cliente. <br/>" ;
        }else{
            $nombres_b = $_POST['name_user'];
        }
        if(empty($_POST['email_user'])){ 
            $errores .= "Debes ingresar el correo del cliente. <br/>" ;
        }else{
            $correo_b = $_POST['email_user'];
            $correo_b = filter_var($correo_b, FILTER_SANITIZE_EMAIL);

           
        }
        if(empty($_POST['categoria'])){
            $errores .= "Debes ingresar la categoria del cliente.  <br/>";
        }else{
            $categoria_b = $_POST['categoria'];
        }
        if(empty($_POST['phone_user'])){
            $errores .= "Debes ingresar el telefono del cliente.  <br/>";
        }else{
            $telefono_b = $_POST['phone_user'];
            if (!preg_match($regexTelefono, $telefono_b)) {
                $errores .= "El telefono es invalido.  <br/>";
            }
        }
    

    if(empty($errores)){
        
        $query = " CALL CREAR_USUARIO( 
            :nombres,
            :telefono,
            :correo, 
            :categoria );
        ";
        $statement  = $conn->prepare($query);
        $statement->execute(array(
            ':nombres' =>  $nombres_b,
            ':telefono' =>$telefono_b,
            ':correo' =>$correo_b,
            ':categoria' =>$categoria_b
        ));
        $result= $statement->fetch();
        echo http_response_code(200);
    }else{
         http_response_code(400);
         echo json_encode(["message" => $errores]);


    }


?>
  