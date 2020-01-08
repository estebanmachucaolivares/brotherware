<?php 

include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $user= $con->real_escape_string(htmlentities($_POST['usuario']));
    $pass= $con->real_escape_string(htmlentities($_POST['contra']));
 
    $candado=' ';

    //buscar caracteres espacio, metodo devuelve un valor entero de la posicion donde encuentre el espacio 
    $str_u=strpos($user,$candado);
    $str_p=strpos($pass,$candado);
    if (is_int($str_u)) {
        $user='';
    }else {
         $usuario=$user;
    }

    if (is_int($str_p)) {
        $pass='';
    }else {
         $password=sha1($pass);
    }

    //validar nulos
    if ($user ==null || $pass == null) {
        header('location:../extend/alerta.php?msj=El formato no es correcto&c=salir&p=salir&t=error');
    }else {
        //consulta
        $sel = $con->query("SELECT id, nick, nombre, nivel, foto, correo, pass FROM usuario WHERE nick='$usuario' AND pass='$password'
         AND bloqueo=1");
        //traer resultado de consulta
        $row = mysqli_num_rows($sel);

        //si la consulta es igual a 1 existe usuario
         if ($row ==1) {
             if ($var=$sel->fetch_assoc()) {
                 
                $id=$var['id'];
                $nick=$var['nick'];
                $contra=$var['pass'];
                $nivel=$var['nivel'];
                $foto=$var['foto'];
                $nombre=$var['nombre'];
                $corre=$var['correo'];
             }
             if ($nick ==$usuario && $contra==$password) {
                 //Crear variable de session
                 $_SESSION['id']=$id;
                 $_SESSION['nick']=$nick;
                 $_SESSION['nombre']=$nombre;
                 $_SESSION['nivel']=$nivel;
                 $_SESSION['correo']=$corre;
                 $_SESSION['foto']=$foto;
                 header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
             }else {
                header('location:../extend/alerta.php?msj=No tienes permiso para entrar&c=salir&p=salir&t=error');
             }
         }else {
            header('location:../extend/alerta.php?msj=Nombre de usuario o contrasena incorrecta&c=salir&p=salir&t=error');  
           
         }

         $con->close();
    }


}else {
    header('location:../extend/alerta.php?msj=Utiliza el Formulario Prueba&c=salir&p=salir&t=error');
}


?>  