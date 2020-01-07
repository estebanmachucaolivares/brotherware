<?php include '../conexion/conexion.php';

$nivelu= $con ->real_escape_string($_POST ['nivelu']);

$sel = $con->query("SELECT id_nivel FROM nivel WHERE nombre_nivel= '$nivelu' ");
$row =mysqli_num_rows($sel);

if($row !=0){

    echo "<label style='color:red'> El nivel ya existe</label>" ;
}else {

    echo "<label style='color:green'> Nombre de nivel disponible</label>" ;
}
$con->close();
?>  