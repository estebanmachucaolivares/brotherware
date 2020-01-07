<?php @session_start();
  if (isset($_SESSION['nick'])) {
    header('location:inicio');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
    <title>Document</title>
</head>
<body class="black">
    <main >
        <div class="row">
            <div class="input-field col s12 center">
             <img src="img/iconbw.png" alt="" width="200" >
            </div>
        </div>
        <div class="container">
           <div class="row">
              <div class="col s12">
                 <div class="card z-depth-5">
                   <div class="card-content">
                   <span class="card-title "><center>INICIO DE SESION</center> </span>
                   <form action="login/index.php" method="post" autocomplete="off">
                     <div class="input-field">
                         <i class="material-icons prefix">perm_identity</i>
                         <input type="text" name="usuario" id="usiuario" pattern="[A-Za-z]{8,15}" autofocus  required >
                         <label for="usuario">Usuario</label>
                     </div>
                     <div class="input-field">
                     <i class="material-icons prefix">vpn_key</i>
                         <input type="password" name="contra" id="contra" pattern="[A-Za-z0-9]{8,15}" required >
                         <label for="contra">Contraseña</label>
                     </div>
                     <div class="input-field center">
                      <button type="submit" class="btn waves-effect waves-light"> Acceder</button>
                     </div>
                   </form>
                   </div>
                </div>   
              </div>
            </div>   
        </div>
    </main>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script src="js/materialize.min.js"></script>
</body>
</html>