<?php
  include_once 'conexion.php';

  session_start();
  if ($_SESSION['tipo'] == "") {
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
  } else {
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
    echo "tipo: " . $_SESSION['tipo'] . "<br/>";
  }

  echo "<br/>" . "<br/>";
  echo '<h1> Resultados de la busqueda </h1>' . '<br/>' . '<br/>';

  $palabra = $_REQUEST["buscar"];
  $consulta_encontrar_video = "SELECT id_video, titulo, foto_video, id_usuario FROM video WHERE titulo = '$palabra'";
  $consulta_encontrar_usuario = "SELECT id_usuario, tipo_usuario, n_subscripciones, n_videos FROM usuario WHERE titulo = '$palabra'";
  $consulta_encontrar_categoria = "SELECT titulo, foto_video, categoria, duracion, descripcion FROM video WHERE categoria = '$palabra'";
  $consulta_encontrar_ldr = "SELECT id_lista_reproduccion, id_usuario, cant_videos FROM lista_reproduccion WHERE id_lista_reproduccion = '$palabra'";
  $result_video = $conn->query($consulta_encontrar_video);
  $result_usuario = $conn->query($consulta_encontrar_usuario);
  $result_categoria = $conn->query($consulta_encontrar_categoria);
  $result_ldr = $conn->query($consulta_encontrar_ldr);

  if (mysqli_num_rows($result_video)!=0) {
    while($row_video = $result_video->fetch_assoc()) {
      $video = $row_video["id_video"];
      echo "titulo: " . $row_video["titulo"] . "<br/>";
      $foto = $row_video["foto_video"];
      echo '<img src="videos/' . $foto . '" width = "120px" height = 120px>' . '<br/>';
      echo "subido por: " . $row_video["id_usuario"] . "<br/>";
      echo '<form method= "POST" action="mostrar_resultados/mostrar_video.php">';
      echo "<input type='hidden' name='id_video' value='$video'>";
      echo '<input type="submit" value="ir al video">';
      echo '</form>';
      echo "<br/>" . "<br/>";
    }
  } else {

  }
?>


<html>
  <head>
    <meta charset = "utf-8">
    <title>!Yaptube</title>
  </head>
  <body>

    <br>
    <a href="pagina_principal.php">volver a pagina principal</a>
  </body>
</html>
