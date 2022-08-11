
<?php 
       include('../model/conexion.php');
       $errores = "";

       if(empty($_POST['id_client_f'])){ 
            $errores .= "Error al traer informacion del usuario. <br/>" ;
        }else{
            $id_cliente = $_POST['id_client_f'];
        }

        if(empty($errores)){
            $query = " CALL INFO_CLIENTE(:id);";
            $statement  = $conn->prepare($query);
            $statement->execute(array(
                ':id' =>  $id_cliente
            ));
            $json = array();
            while($row = $statement->fetch()){
                $json[] = array(
                'id' => $row['id'],
                'id_persona' => $row['id'],
                'nombres' => $row['nombres'],
                'telefono'=> $row['telefono'],
                'categoria'=> $row['categoria'],
                'correo'=> $row['correo']
                );
            }
            //mando al fronet convertido en string
            $jsonString = json_encode($json);
            echo $jsonString;
        }
    
?>
  