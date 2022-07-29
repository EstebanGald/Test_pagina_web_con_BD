<?php
  include_once '../conexion.php';

  session_start();
  if ($_SESSION['tipo'] == "") {
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
  } else {
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
    echo "tipo: " . $_SESSION['tipo'] . "<br/>";
  }
  if ($_SESSION['usuario'] != 'invitado') {
    $usuario_activo = $_SESSION['usuario'];
    $consulta_tiene_lista_reproduccion = "SELECT id_lista_reproduccion FROM lista_reproduccion WHERE id_usuario = '$usuario_activo'";
    $result = $conn->query($consulta_tiene_lista_reproduccion);
    if (mysqli_num_rows($result)==0) {
      echo "No tienes listas de reproduccion" . "<br/>" . "<br/>";

    } else {
      echo "Listas de reproduccion creadas: " . "<br/>" . "<br/>";
      $consulta_mostrar_ldr = "SELECT id_lista_reproduccion FROM lista_reproduccion WHERE id_usuario = '$usuario_activo'";
      $result = $conn->query($consulta_mostrar_ldr);
      while($row = $result->fetch_assoc()) {
        echo '<a href="mostrar_ldr.php">' . $row["id_lista_reproduccion"] . '</a>';
        echo "<br/>" . "<br/>";
      }
    }

  }


?>

<html>
  <head>
    <meta charset = "utf-8">
    <title>!Yaptube</title>
  </head>
  <body>
    <form action="crear_lista_de_reproduccion.php">
      <input type="submit" value="crear lista de reproduccion">
    </form>
    <br>
    <a href="../pagina_principal.php">volver a pagina principal</a>
  </body>
</html>
