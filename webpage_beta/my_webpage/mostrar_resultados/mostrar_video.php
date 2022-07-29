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
  $video = $_REQUEST["id_video"];
  //$usuario = $_REQUEST["subido_por"];
  $mostrar_video = "SELECT id_video, titulo, foto_video, categoria, duracion, descripcion, id_usuario FROM video WHERE id_video = '$video'";
  $result_video = $conn->query($mostrar_video);
  $like = 0;
  $dislike = 0;
  while($row_video = $result_video->fetch_assoc()) {
    $video_id = $row_video["id_video"];
    $usuario_id = $row_video["id_usuario"];
    echo "titulo: " . $row_video["titulo"] . "<br/>";
    $foto = $row_video["foto_video"];
    echo '<img src="../videos/' . $foto . '" width = "120px" height = 120px>' . '<br/>';
    echo "categoria: " . $row_video["categoria"] . "<br/>";
    echo "duracion: " . $row_video["duracion"] . "<br/>";
    echo "descripcion: " . $row_video["descripcion"] . "<br/>";
    echo "subido por: " . $usuario_id . "   ";
    echo '<form method= "POST" action="mostrar_usuario.php">';
    echo "<input type='hidden' name='usuario_a_visitar' value='$usuario_id'>";
    echo '<input type="submit" value="ver perfil">';
    echo '</form>';
    $mostrar_reaccion = "SELECT arriba, abajo FROM reaccion_video WHERE id_video = '$video_id'";
    $result_reaccion = $conn->query($mostrar_reaccion);
    if (mysqli_num_rows($result_reaccion)!=0) {
      $row_reaccion = $result_reaccion->fetch_assoc();
      $like = $row_reaccion['arriba'];
      $dislike = $row_reaccion['abajo'];
    }
    echo "Likes: " . $like . "<br/>";
    echo "Dislikes: " . $dislike . "<br/>" . "<br/>";
    echo '<form method= "POST" action="crear_reaccion.php">';
    echo "<input type='hidden' name='id_usuario' value='$usuario_id'>";
    echo "<input type='hidden' name='id_video' value='$video_id'>";
    echo "<input type='hidden' name='arriba' value='1'>";
    echo '<input type="submit" value="dar_like">';
    echo '</form>';
    echo '<form method= "POST" action="crear_reaccion.php">';
    echo "<input type='hidden' name='id_usuario' value='$usuario_id'>";
    echo "<input type='hidden' name='id_video' value='$video_id'>";
    echo "<input type='hidden' name='abajo' value='1'>";
    echo '<input type="submit" value="dar_dislike">';
    echo '</form>';
    echo "<br/>";

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
