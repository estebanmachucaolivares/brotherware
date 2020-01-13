<nav class="z-depth-5">
<div class="nav-wrapper teal darken-2" >
<div class="row" >
  <div class="col m12" >
  <a href="" data-activates="menu" class="button-collpase" ><i class="material-icons">menu</i></a>
  <div class="nav-wrapper">
  <a href="#"class="brand_logo" >BrotherWare Mantenedor</a>
  </div>
  </div>
  </div>
  </div>
</nav>
<ul id="menu" class="side-nav fixed" >
  <li>
    <div class="userView" >
      <div class="background">
        <img src="../img/fondo.png"  >
      </div>
      <a href="../perfil/index.php" ><img src="../usuarios/<?php  echo $_SESSION['foto']?>" class="circle" alt=""></a>
      <a href="../perfil/perfil.php"  ><?php  echo $_SESSION['nombre']?> </a>
      <a href="../perfil/perfil.php" ><?php  echo $_SESSION['correo']?> </a>
    </div>
  </li>
  <li><a href="../inicio"><i class="material-icons">home</i> INICIO</a></li>
  <li><div class="divider" ></div></li>
  <li><a href="../login/salir.php"><i class="material-icons">power_settings_new</i> SALIR</a></li>
  <li><div class="divider" ></div></li>
</ul>