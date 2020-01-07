<?php include '../extend/header.php';?>  

<div class="row">
    <div class="col s12">
    
  <div class="card">
    <div class="card-content">
      <h3 class="teal-text text-lighten-0">Editar Perfil</h3>
    </div>
    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width ">
        <li class="tab"><a href="#datos" class="active teal-text text-lighten-2">Datos</a></li>
        <li class="tab"><a  href="#pass" class="teal-text text-lighten-2">Contraseña</a></li>
        <div class="indicator teal  lighten-2" style="z-index:1"></div>
      </ul>
    </div>
    <div class="card-content grey lighten-4">
      <div id="datos">
      <form clas="form" action="up_perfil.php" method="post" enctype="multipart/form-data">
            <div class=input-field>
            <input type="text" id="nick" name="nick" required autofocus 
            title="DEBE DE CONTENER ENTRE 8 Y 15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z]{8,15}" onblur="may(this.value, this.id)"
            value="<?php echo $_SESSION['nick']?>">
            <label for="nick">Nombre de Usuario: </label>
            </div>
            <div class=validacion></div>
        
           
            <div class=input-field>
            <input type="text" id="nombre" name="nombre" required
            title="Nombre del Usuario" pattern="[A-Za-z\s]+" onblur="may(this.value, this.id)"
            value="<?php echo $_SESSION['nombre']?>">
            <label for="nombre">Nombre Completo: </label>
            </div>

            <div class=input-field>
            <input type="text" id="correo" name="correo" 
            title="Correo Electronico" 
            value="<?php echo $_SESSION['correo']?>" >
            <label for="correo">Correo Electronico: </label>
            </div>


            <button type="submit" class="btn" >Guardar Cambios </button>
            </form>
      </div>
      <div id="pass">
      <form clas="form" action="up_pass.php" method="post" enctype="multipart/form-data">
    
         
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



            <button type="submit" class="btn" id="btn_guardar">Guardar Cambios</button>
            </form>
      </div>
    </div>
  </div>

    </div>
</div>

<?php include '../extend/scripts.php';?>  
<script src="../js/validacion.js"></script>
</body>
</html>

