<?php
  include_once '../conexion.php';

  session_start();
  if ($_SESSION['tipo'] == "") {
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
  } else {
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
    echo "tipo: " . $_SESSION['tipo'] . "<br/>";
  }

  echo "<br/>" . "<br/>";
  $usuario_a_visitar = $_REQUEST['usuario_a_visitar'];
  $consulta_mostrar_usuario = "SELECT id_usuario, tipo_usuario, n_subscripciones FROM usuario WHERE id_usuario = '$usuario_a_visitar'";
  $result = $conn->query($consulta_mostrar_usuario);
  echo "<h1>Informacion del usuario:</h1>" . "<br/>";
  while($row = $result->fetch_assoc()) {
    echo "id usuario: " . $row["id_usuario"] . "<br/>";
    echo "tipo usuario: " . $row["tipo_usuario"] . "<br/>";
    echo "cantidad de seguidores: " . $row["n_subscripciones"] . "<br/>";
  }
  $consulta_videos = "SELECT id_video, titulo, foto_video, id_usuario FROM video WHERE id_usuario = '$usuario_a_visitar'";
  $result2 = $conn->query($consulta_videos);
  echo "<br/>";
  if(mysqli_num_rows($result2)!=0) {
    echo "Videos:" . "<br/>" . "<br/>";
    while($row_video = $result2->fetch_assoc()) {
      $video = $row_video["id_video"];
      echo "titulo: " . $row_video["titulo"] . "<br/>";
      $foto = $row_video["foto_video"];
      echo '<img src="../videos/' . $foto . '" width = "120px" height = 120px>' . '<br/>';
      echo "subido por: " . $row_video["id_usuario"] . "<br/>";
      echo '<form method= "POST" action="mostrar_video.php">';
      echo "<input type='hidden' name='id_video' value='$video'>";
      echo '<input type="submit" value="ir al video">';
      echo '</form>';
      echo "<br/>" . "<br/>";
    }
  } else {
    echo "Este usuario no ha subido videos" ."<br/>" . "<br/>";
  }

?>

<html>
  <head>
    <meta charset = "utf-8">
    <title>!Yaptube</title>
  </head>
  <body>

    <br>
    <a href="../pagina_principal.php">volver a pagina principal</a>
  </body>
</html>
