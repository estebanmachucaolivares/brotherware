<?php include '../conexion/conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    $nick=$con->real_escape_string(htmlentities($_POST['nick']));
    $pass1=$con->real_escape_string(htmlentities($_POST['pass1']));
    $nivel=$con->real_escape_string(htmlentities($_POST['nivel']));
    $nombre=$con->real_escape_string(htmlentities($_POST['nombre']));
    $correo=$con->real_escape_string(htmlentities($_POST['correo']));

    //validar campos vacios
    if(empty($nick) || empty($pass1) || empty($nombre) || empty($correo)){
        header('location:../extend/alerta.php?msj=Hay un campo sin especificar&c=us&p=in&t=error');
        exit;
    }

    //validacion de solo letras
    if (!ctype_alpha($nick )) {
        header('location:../extend/alerta.php?msj=El nombre de usuario no contiene solo letras&c=us&p=in&t=error');
        exit;
    }
    
    //validar solo letras y espacios en nombre
    $caracteres= "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ ";
    for ($i=0; $i < strlen($nombre); $i++) { 
      $buscar = substr($nombre,$i,1);
      if (strpos($caracteres,$buscar)===false) {
        header('location:../extend/alerta.php?msj=El nombre no contiene solo letras&c=us&p=in&t=error');
        exit;
      }
    }

    //validacion de nombre de usuario y contraseña
    $usuario =strlen($nick);
    $contra =strlen($pass1);

    //validar que se encuentre entre e rango de 8 y 15 caracteres
    if ($usuario <8 || $usuario >15) {
        header('location:../extend/alerta.php?msj=El nombre de usuario debe tenerno entre 8 y 15 caracteres&c=us&p=in&t=error');
        exit;
    }
    if ($contra <8 || $contra >15) {
        header('location:../extend/alerta.php?msj=La contraseña debe tener entre 8 y 15 caracteres&c=us&p=in&t=error');
        exit;
    }
     //Validar correo
     if (!filter_var($correo,FILTER_VALIDATE_EMAIL)) {
        header('location:../extend/alerta.php?msj=El correo electronico no es valido&c=us&p=in&t=error');
        exit;
     }

     $extension ='';
     $ruta='foto_perfil';
     $archivo=$_FILES['foto']['tmp_name'];
     $nombrearchivo=$_FILES['foto']['name'];
     $info = pathinfo($nombrearchivo);
     if ($archivo !='') {
         $extension = $info['extension'];
         if ($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG") {
             move_uploaded_file($archivo,'foto_perfil/'.$nick.'.'.$extension); 
             $ruta=$ruta."/".$nick.'.'.$extension;
         }else {
            header('location:../extend/alerta.php?msj=El formato no es valido&c=us&p=in&t=error');
            exit;
         }
     }else {
         $ruta="foto_perfil/perfil.png";
     }


     //transformar varible nivel a entero
     $nivelint=(int) $nivel;

     //encriptar contraseña
     $pass=sha1($pass1);

      $ins= $con->query("INSERT INTO usuario (nick,pass,nombre,correo,nivel,bloqueo,foto) VALUES('$nick','$pass','$nombre','$correo',$nivelint,1,'$ruta')");
      if ($ins) {
        header('location:../extend/alerta.php?msj=El Usuario ha sido registrado&c=us&p=in&t=success');
       
      }else {
        header('location:../extend/alerta.php?msj=El Usuario no ha sido registrado&c=us&p=in&t=error');
      }
    
      $con->close();
}else{
  header('locations:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
}

?>  