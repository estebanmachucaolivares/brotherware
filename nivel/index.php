<?php include '../extend/header.php';
     include '../extend/permiso.php';
?>  
<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <h3 class="teal-text text-lighten-0">Niveles de Usuario</h3>
        <form clas="form col m10 center-align" action="ins_nivel.php" method="post" enctype="multipart/form-data">
        
        <div class=input-field>
            <input type="text" id="nivelu" name="nivelu" required autofocus 
            title="DEBE CONTENER SOLO LETRAS" pattern="[A-Za-z]{5,20}" onblur="may(this.value, this.id)">
            <label for="nivelu">Nombre de Nivel de Usuario: </label>
            </div>
            <div class=validacionnivel></div>
        

            <button type="submit" class="btn " id="btn_guardar">Guardar</button>
       </form>
     
      </div>
    </div>
  </div>
</div>



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
$sel = $con->query("SELECT * FROM nivel");

//contar cantidad de usuarios
$row =mysqli_num_rows($sel);
?>
<div class="row">
   <div class="col s12">
      <div class="card">
         <div class="card-content">
          <span class="card-title"> NIVELES DE USUARIO (<?php echo $row ?>)</span>
           <table>
             <thead>
               <tr class="cabecera">
               <th>ID</th>
               <th>Nombre nivel Usuario</th>
               <th></th>
              
               </tr>
             </thead>
               <?php while ($f = $sel->fetch_assoc()) {?>
                 <tr>
                   <td><?php echo $f['id_nivel'] ?></td>
                   <td><?php echo $f['nombre_nivel'] ?></td>
                   <td><td><button class="btn-floating red" id="eliminar_nivel" onclick="eliminar('<?php echo $f['id_nivel'] ?>','n')"><i class="material-icons">delete</i></button></td></td>
                  
                 </tr>
              <?php }?>
           </table>
         </div>
      </div>
   </div>
</div>


<?php $con->close();?>
<?php include '../extend/scripts.php';?>  
<script src="../js/validacion_nivel.js"></script>
<script src="../js/eliminar.js"></script>
</body>
</html>