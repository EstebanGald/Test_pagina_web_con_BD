<?php
  include_once 'conexion.php';

  session_start();
  if ($_SESSION['tipo'] == "") {
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
  } else {
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
    echo "tipo: " . $_SESSION['tipo'] . "<br/>";
  }
?>


<html>
  <head>
    <meta charset = "utf-8">
    <title>!Yaptube</title>
  </head>
  <body>
    ¡Operación exitosa!
  </body>
</html>
