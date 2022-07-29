<?php
  include_once '../conexion.php';

  session_start();
  if ($_SESSION['tipo'] == "") {
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
  } else {
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
    echo "tipo: " . $_SESSION['tipo'] . "<br/>";
  }

  echo "<br/>";

  if ($_POST) {
    $usuario_activo = $_SESSION['usuario'];
    $nombre_ldr = $_POST["nombre"];
    $insert_ldr = "INSERT INTO lista_reproduccion (id_lista_reproduccion,id_usuario,cant_videos)
    VALUES ('$nombre_ldr','$usuario_activo',0)";
    if ($conn->query($insert_ldr)) {
      header("Location: ldr_operacion_exitosa.php");
    } else {
      echo "No se pudo agregar la lista de reproduccion a la base de datos";
    }
  }

?>

<html>
  <head>
    <meta charset = "utf-8">
    <title>!Yaptube</title>
  </head>
  <body>
    <form method="POST">
      <label for="id_name">Ingrese nombre de la lista de reproduccion</label><br>
      <input type="text" id="id_name" name="nombre"><br>
      <br><br>
      <input type="submit" value="confirmar">
    </form>
    <br><br>
    <a href="../pagina_principal.php">volver a pagina principal</a>
  </body>
</html>
