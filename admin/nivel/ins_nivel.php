<?php include '../conexion/conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
   
    $nivelu=$con->real_escape_string(htmlentities($_POST['nivelu']));

    //validar que se encuentre entre e rango de 0 y 20 caracteres
    $nivel=strlen($nivelu);
    if ($nivel<5|| $nivel>20) {
        header('location:../extend/alerta.php?msj=El nivel de usuario debe tenerno entre 5  y 20 caracteres&c=niv&p=niv&t=error');
        exit;
    }

    $ins= $con->query("INSERT INTO nivel (nombre_nivel) VALUES('$nivelu')");
      if ($ins) {
        header('location:../extend/alerta.php?msj=Nivel registradoregistrado&c=niv&p=niv&t=success');
       
      }else {
        header('location:../extend/alerta.php?msj=El nivel no ha sido registrado&c=us&p=in&t=error');
      }
      $con->close();
  
}else{
    header('locations:../extend/alerta.php?msj=ERROR&c=us&p=in&t=error');
  }

  ?>