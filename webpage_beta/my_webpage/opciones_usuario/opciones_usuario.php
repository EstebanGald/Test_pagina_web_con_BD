<?php
  include_once '../conexion.php';

  session_start();
  if ($_SESSION['tipo'] == "") {
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
  } else {
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
    echo "tipo: " . $_SESSION['tipo'] . "<br/>";
  }


  if ($_SESSION['usuario'] != "invitado") {
    echo "<br/>" . "Informacion de usuario" . "<br/><br/>";
    $usuario_activo = $_SESSION['usuario'];
    $consulta_sql = "SELECT id_usuario, tipo_usuario, n_subscripciones FROM usuario WHERE id_usuario = '$usuario_activo'";
    $result = $conn->query($consulta_sql);
    while($row = $result->fetch_assoc()) {
      echo "id usuario: " . $row["id_usuario"] . "<br/>";
      echo "tipo usuario: " . $row["tipo_usuario"] . "<br/>";
      echo "cantidad de seguidores: " . $row["n_subscripciones"] . "<br/>";
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

    <br><br>
    <a href="../pagina_principal.php">volver a pagina principal</a>
  </body>
</html>
