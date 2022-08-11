<?php 
include('../model/conexion.php');
    //Consulta para ver los datos de clientes que realizaron el servicio
$query = "SELECT * FROM  TABLA_CLIENTES";
//preparamos la consulta
$statement = $conn->prepare($query);
//ejecutamos el statement
$resultado= $statement->execute();
//este array será para mandarlo al front
$json = array();
//rellenar el array object con los valores que obtengo de la base de datos
while($row = $statement->fetch()){
    $json[] = array(
    'id' => $row['id'],
    'nombres' => $row['nombres'],
    'telefono'=> $row['telefono'],
    'categoria'=> $row['categoria'],
    'correo'=> $row['correo']
    );
}
//mando al fronet convertido en string
$jsonString = json_encode($json);
echo $jsonString;

?>