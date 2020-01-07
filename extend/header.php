<?php include '../conexion/conexion.php';
if (!isset($_SESSION['nick'])) {
    header('location:../'); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/limonate-sweetalert/6.3.2.7sweetalert2.css">
    
   

    <style>
     header, main, footer {
      padding-left: 300px;
    }
    .button-collpase{
        display: none;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }

      .button-collpase{
        display: inherit;
    }
    }</style>
</head>
<body>
    
<main>
<?php 

if ($_SESSION['nivel']==1) {
  include 'menu_admin.php';
}else {
  include 'menu_mantenedor.php';
}

?>