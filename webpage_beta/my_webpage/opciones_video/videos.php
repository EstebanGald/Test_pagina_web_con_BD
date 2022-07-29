<?php
  include_once '../conexion.php';

  session_start();
  if ($_SESSION['tipo'] == "") {
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
  } else {
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
    echo "tipo: " . $_SESSION['tipo'] . "<br/>";
  }

  echo "<br/><br/>";

  if ($_SESSION['usuario'] != "invitado") {
    $usuario_activo = $_SESSION['usuario'];
    $consulta_n_videos = "SELECT n_videos FROM usuario WHERE id_usuario = '$usuario_activo'";
    $result = $conn->query($consulta_n_videos);
    $row = $result->fetch_assoc();
    if ($row['n_videos'] == 0) {
      echo "¡No has subido ningún video!" . "<br/>";
    } else {
      $consulta_videos = "SELECT titulo, foto_video, categoria, duracion, descripcion  FROM video WHERE id_usuario = '$usuario_activo'";
      $result2 = $conn->query($consulta_videos);
      while($row = $result2->fetch_assoc()) {
        echo "titulo: " . $row["titulo"] . "<br/>";
        $foto = $row["foto_video"];
        echo '<img src="../videos/' . $foto . '" width = "120px" height = 120px>' . '<br/>';
        echo "categoria: " . $row["categoria"] . "<br/>";
        echo "duracion : " . $row["duracion"] . "<br/>";
        echo "descripcion : " . $row["descripcion"] . "<br/>" . "<br/>";
      }
    }
  } else {
    echo "No tienes una cuenta para acceder a estas opciones" . "<br/>";
  }

?>

<html>
  <head>
    <meta charset = "utf-8">
    <title>!Yaptube</title>
  </head>
  <body>
    <br>
    <form action="subir_video.php">
      <input type="submit" value="subir video">
    </form>
    <br><br>
    <a href="../pagina_principal.php">volver a pagina principal</a>
  </body>
</html>
