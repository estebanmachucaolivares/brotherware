<nav class="black">
  <a href="" data-activates="menu" class="button-collpase" ><i class="material-icons">menu</i></a>
  <div class="nav-wrapper">
  <a href="#"class="brand_logo" >BrotherWare Administrador</a>
  </div>
</nav>
<ul id="menu" class="side-nav fixed " >
  <li>
    <div class="userView" >
      <div class="background ">
        <img src="../img/fondo.png" class="responsive-img"  >
      </div>
      <a href="../perfil/index.php" class=""><img src="../usuarios/<?php  echo $_SESSION['foto']?>" class="circle" alt=""></a>
      <a href="../perfil/perfil.php" class="white-text center" ><?php  echo $_SESSION['nombre']?> </a>
      <a href="" class="white-text center"><?php  echo $_SESSION['correo']?>  </a>
    </div>
  </li>
  <li><a href="../inicio"><i class="material-icons">home</i> INICIO</a></li>
  <li><div class="divider" ></div></li>
  <li><a href="../nivel"><i class="material-icons">format_list_bulleted</i> NIVEL USUARIO</a></li>
  <li><div class="divider" ></div></li>
  <li><a href="../usuarios"><i class="material-icons">contacts</i> USUARIOS</a></li>
  <li><div class="divider" ></div></li>
  <li><a href="../login/salir.php"><i class="material-icons">power_settings_new</i> SALIR</a></li>
  <li><div class="divider" ></div></li>
</ul>