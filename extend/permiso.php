<?php

$nivel= (int) $_SESSION['nivel'] ;
if ($nivel>1) {
header("location:bloqueo.php");
}

?>