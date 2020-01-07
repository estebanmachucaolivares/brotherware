
<?php include '../extend/header.php';
       include '../extend/permiso.php';
       
       ?>  


<div class="row">
    <div class="col s12">
    
  <div class="card">
    <div class="card-content">
      <h3 class="teal-text text-lighten-0">Usuarios</h3>
    </div>
    <div class="card-tabs ">
      <ul class="tabs tabs-fixed-width ">
        <li class="tab "><a href="#usuario" class="active teal-text text-lighten-2">Nuevo Usuario</a></li>
        <li class="tab"><a  href="#lista"  class="teal-text text-lighten-2">Lista Usuarios</a></li>
        <div class="indicator teal  lighten-2" style="z-index:1"></div>
   
        
      </ul>
    </div>
    <div class="card-content grey lighten-4">
      <div id="usuario">
    
      <div class="row center-align">
               <div class="col s12 center-align" >


           <form clas="form" action="ins_usuario.php" method="post" enctype="multipart/form-data">
            <div class=input-field>
            <input type="text" id="nick" name="nick" required autofocus 
            title="DEBE DE CONTENER ENTRE 8 Y 15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z]{8,15}" onblur="may(this.value, this.id)">
            <label for="nick">Nombre de Usuario: </label>
            </div>
            <div class=validacion></div>
        
            
            <div class=input-field>
            <input type="password" id="pass1" name="pass1" required
            title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS Y MINUSCULAS ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}">
            <label for="pass1">Contraseña: </label>
            </div>

            <div class=input-field>
            <input type="password" id="pass2" name="pass2" required
            title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS Y MINUSCULAS ENTRE 8 Y 15 CARACTERES" pattern="[A-Za-z0-9]{8,15}">
            <label for="pass2">Validar Contraseña: </label>
            </div>

            <?php  
            //traer niveles
            $selnivel = $con->query("SELECT * FROM nivel");
            ?>
            <select name="nivel" id="nivel" >
                <option value="" disabled selected> Seleccionar nivel de Usuario</option>
                <?php while ($n = $selnivel->fetch_assoc()) {?>
                <option value="<?php echo $n['id_nivel']?>"><?php echo $n['nombre_nivel']?></option>
                <?php }
                ?>
            </select>
        
           
            <div class=input-field>
            <input type="text" id="nombre" name="nombre" required
            title="Nombre del Usuario" pattern="[A-Za-z\s]+" onblur="may(this.value, this.id)">
            <label for="nombre">Nombre Completo: </label>
            </div>

            <div class=input-field>
            <input type="text" id="correo" name="correo" 
            title="Correo Electronico"  >
            <label for="correo">Correo Electronico: </label>
            </div>

            <div class="file-field input-field">
              <div class="btn">
              <span>Foto:</span>
                <input type="file" name="foto" >
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>

            <button type="submit" class="btn" id="btn_guardar">Guardar </button>
            </form>


            </div>
           </div>


      </div>
      <div id="lista">
      <div class="row">
  <div class="col s12">
    <nav class="teal lighten-3">
    <div class="nav-wrapper">
       <div class="input-field">
         <input type="search" id="buscar" autocomplete="off">
         <label for="buscar"><i class="material-icons">search</i></label>
         <i class="material-icons">close</i>
       </div>
    </div>
    </nav>
  </div>
</div>

<?php  
//traer usuarios
$sel = $con->query("SELECT  usuario.id,usuario.nivel,usuario.nick,usuario.nombre, usuario.correo, nivel.nombre_nivel,usuario.bloqueo,usuario.foto FROM usuario,nivel WHERE usuario.nivel=nivel.id_nivel");
//contar cantidad de usuarios
$row =mysqli_num_rows($sel);
?>
      <table>
             <thead>
               <tr class="cabecera">
               <th>Nombre de usuarios</th>
               <th>Nombre</th>
               <th>Correo electronico</th>
               <th>Nivel</th>
               <th></th>
               <th>Bloqueo</th>
               <th>Foto</th>
               <th>Eliminar</th>
               <th></th>
               </tr>
             </thead>
               <?php while ($f = $sel->fetch_assoc()) {?>
                 <tr>
                   <td><?php echo $f['nick'] ?></td>
                   <td><?php echo $f['nombre'] ?></td>
                   <td><?php echo $f['correo'] ?></td>
                   <td>
                  <form action="up_nivel.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $f['id'] ?>">
                    <select name="nivel" id="nivel" >
                    <?php  
                    //traer niveles
                    $selnivel = $con->query("SELECT * FROM nivel");
                    ?>
                     <option value="<?php echo $f['nivel']?>" disabled selected> <?php echo $f['nombre_nivel']?></option>
                    <?php while ($n = $selnivel->fetch_assoc()) {?>
                    <option value="<?php echo $n['id_nivel']?>"><?php echo $n['nombre_nivel']?></option>
                    <?php }?>
                  </select>
              
                  </td>
                  <td>
                    <button type="submit" class="btn-floating"><i class="material-icons">repeat</i></button>
                    </form>
                  </td>
                   <td>
                   <?php if ($f['bloqueo']==1): ?>
                    <a href="bloqueo_manual.php?us=<?php echo $f['id'] ?>&bl=<?php echo $f['bloqueo'] ?>"> 
                    <i class="material-icons green-text">lock_open</i></a>
                    <?php else: ?>
                    <a href="bloqueo_manual.php?us=<?php echo $f['id'] ?>&bl=<?php echo $f['bloqueo'] ?>"> 
                    <i class="material-icons red-text">lock_outline</i></a>
                    <?php endif; ?>
                  </td>
                   <td><img src="<?php echo $f['foto'] ?>" width="50" class="circle"></td>
                   <td><button class="btn-floating red" id="eliminar" onclick="eliminar('<?php echo $f['id'] ?>','u')"><i class="material-icons">delete</i></button></td>
                   <td></td>
                 </tr>
              <?php }?>
           </table>
      </div>
    </div>
  </div>
</div>
</div>

<?php $con->close();?>

<?php include '../extend/scripts.php';?>  
<script src="../js/validacion.js"></script>
<script src="../js/eliminar.js"></script>
</body>
</html>