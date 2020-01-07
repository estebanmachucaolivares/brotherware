<?php include '../conexion/conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nick=$_SESSION['nick'];
    $foto=$_SESSION['foto'];

    $extension ='';
    $ruta='foto_perfil';
    $archivo=$_FILES['foto']['tmp_name'];
    $nombrearchivo=$_FILES['foto']['name'];
    $info = pathinfo($nombrearchivo);
    if ($archivo !='') {
        $extension = $info['extension'];
        if ($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG") {
            unlink('../usuarios/'.$foto);

            //numero aleatorio
            $rand= rand(000,999);
            move_uploaded_file($archivo,'../usuarios/foto_perfil/'.$nick.$rand.'.'.$extension); 
            $ruta=$ruta."/".$nick.$rand.'.'.$extension;

            $up = $con->query("UPDATE usuario SET foto='$ruta' WHERE nick='$nick' ");

            if ($up) {
                //actualizar variable de session foto
                $_SESSION['foto']=$ruta;
                header('location:../extend/alerta.php?msj=Foto de perfil actualizada!&c=pe&p=in&t=success');
            }else {
                header('location:../extend/alerta.php?msj=No se ha podido actualizar foto de perfil!&c=pe&p=in&t=error');
            }
        }else {
           header('location:../extend/alerta.php?msj=El formato no es valido!&c=pe&p=in&t=error');
           exit;
        }
    }else {
        header('locations:../extend/alerta.php?msj=No se encontro foto para actualiar!&c=pe&p=in&t=error');
    }

    $con->close();
}else{
    header('locations:../extend/alerta.php?msj=Utiliza el formulario!&c=pe&p=in&t=error');
  }
?>  