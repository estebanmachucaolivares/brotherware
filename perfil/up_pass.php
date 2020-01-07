<?php include '../conexion/conexion.php';


if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=$_SESSION['id'];
    
    $pass=$con->real_escape_string(htmlentities($_POST['pass1']));
    
    $pass1=sha1($pass);

    $up=$con->query("UPDATE usuario SET pass='$pass1'WHERE id='$id' ");


    if ($up) {
        $_SESSION['pass']=$pass;
        header('location:../extend/alerta.php?msj=Contrasena actualizada!&c=pe&p=perfil&t=success');
        
    }else {
        header('location:../extend/alerta.php?msj=Contrasena no actualizada!&c=pe&p=perfil&t=error');
    }

    $con->close();
}else{
    header('locations:../extend/alerta.php?msj=Utiliza el formulario!&c=pe&p=in&t=error');
  }
?>  
