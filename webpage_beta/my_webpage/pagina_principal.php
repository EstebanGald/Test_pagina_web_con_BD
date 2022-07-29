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
    <form method="post" action="resultado_busqueda.php" >
      <p>
        Busqueda de cosas: <input type="search" name="buscar"
        placeholder="video,usuario,lista reproduccion...">
        <input type="submit" value="Buscar">
      </p>
    </form>
    <br>
    <a href="opciones_usuario/opciones_usuario.php">ver perfil</a><br>
    <a href="opciones_video/videos.php">mis videos</a><br>
    <a href="opciones_lista_de_reproduccion/listas_de_reproduccion.php">mis listas de reproduccion</a>
  </body>
</html>
