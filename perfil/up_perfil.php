<?php include '../conexion/conexion.php';


if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=$_SESSION['id'];
    
    $nick=$con->real_escape_string(htmlentities($_POST['nick']));
    $nombre=$con->real_escape_string(htmlentities($_POST['nombre']));
    $correo=$con->real_escape_string(htmlentities($_POST['correo']));

    $up=$con->query("UPDATE usuario SET nick='$nick',nombre='$nombre',correo='$correo' WHERE id='$id' ");

    if ($up) {
        $_SESSION['nick']=$nick;
        $_SESSION['nombre']=$nombre;
        $_SESSION['correo']=$correo;
        header('location:../extend/alerta.php?msj=Datos actualizados!&c=pe&p=perfil&t=success');
        
    }else {
        header('location:../extend/alerta.php?msj=Datos no actualizados!&c=pe&p=perfil&t=error');
    }

    $con->close();
}else{
    header('locations:../extend/alerta.php?msj=Utiliza el formulario!&c=pe&p=in&t=error');
  }
?>  
