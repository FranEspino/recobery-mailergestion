<?php 
$errores = "";
session_start();
$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
if(isset($_POST['send'])){
    if(empty($_POST['correo'])){ 
        $errores .= "Debes ingresar tu correo. <br/>" ;
    }else{
        $email = $_POST['correo'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (!preg_match($regex, $email)) {
            $errores .= "El correo es invalido.  <br/>";
        }
    }
    if(empty($_POST['password'])){
        $errores .= "Debes ingresar tu contraseña.  <br/>";
    }else{
        $password = $_POST['correo'];
    }
    if($password != "admin" && $email != "admin@gmail.com"){
        
        $errores .= "Usuario o contraseña incorrecto.  <br/>";

    }

    if(empty($errores)){
            $_SESSION['email'] = $email ;
            header("location: ../index.php");
        

    }
  
 
}
?>
