<?php include '../conexion/conexion.php';


$id=$con->real_escape_string(htmlentities($_GET['id']));
$mant=$con->real_escape_string(htmlentities($_GET['mant']));

    


switch ($mant) {
    case 'u':
        $del=$con->query("DELETE FROM usuario WHERE id='$id' ");
        break;
    case 'n':
            $del=$con->query("DELETE FROM nivel WHERE id_nivel='$id' ");
            break;
    default:
        break;
}
if ($del) {
    switch ($mant) {
        case 'u':
            header('location:../extend/alerta.php?msj=Registro eliminado!&c=us&p=in&t=success'); 
            break;
        case 'n':
            header('location:../extend/alerta.php?msj=Nivel Eliminado&c=niv&p=niv&t=success');
                break;
        default:
            break;
    }
    
}else {
    header('location:../extend/alerta.php?msj=Nose ha podido eliminar el registro!&c=us&p=in&t=error'); 
}

$con->close();
?>  