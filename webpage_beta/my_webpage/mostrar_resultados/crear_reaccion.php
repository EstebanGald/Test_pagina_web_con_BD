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

  $megusta = $_REQUEST['arriba'];
  $nomegusta = $_REQUEST['abajo'];
  $usuario = $_REQUEST['id_usuario'];
  $video_id = $_REQUEST['id_video'];
  if ($megusta == '1') {
    if ($conn->query($insert_like)) {
      header("Location: ")
    }
  } else if ($nomegusta == '1') {
    echo "No me gusta";
  }

?>
