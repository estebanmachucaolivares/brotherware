<?php include '../conexion/conexion.php';


$id=$con->real_escape_string(htmlentities($_GET['id']));


$del=$con->query("DELETE FROM nivel WHERE id_nivel='$id' ");
if ($del) {
    header('location:../extend/alerta.php?msj=Registro eliminado!&c=us&p=in&t=success'); 
}else {
    header('location:../extend/alerta.php?msj=Nose ha podido eliminar el registro!&c=us&p=in&t=success'); 
}

$con->close();
?>  