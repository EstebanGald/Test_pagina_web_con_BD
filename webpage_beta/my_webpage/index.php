<?php
session_start();
setcookie(session_name(), '', 100);
session_unset();
session_destroy();
$_SESSION = array();
include_once 'conexion.php';
//previous
session_start();

if($_POST) {
  if (empty($_POST["nombre"]) && empty($_POST["nombre_2"])) {
    $_SESSION['usuario'] = "invitado";
    $_SESSION['tipo'] == "";
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
    header("Location: pagina_principal.php");

  } else if (!empty($_POST["nombre_2"])) {
    $_SESSION['usuario'] = $_POST["nombre_2"];
    $_SESSION['tipo'] = $_POST["tipo_2"];
    echo "usuario: " . $_SESSION['usuario'] . "<br/>";
    echo "tipo: " . $_SESSION['tipo'] . "<br/>";
    header("Location: pagina_principal.php");
  } else {

    $id_usuario = $_POST["nombre"];
    $tipo_usuario = $_POST["tipo"];
    $contrasena = $_POST["password"];
    $sql_command = "INSERT INTO usuario (id_usuario,tipo_usuario,n_subscripciones,contraseña,n_videos,creador_contenido)
    VALUES ('$id_usuario','$tipo_usuario',0,'$contrasena',0,0)";
    if ($id_usuario != "") {
      $conn->query($sql_command);
      $_SESSION['usuario'] = $_POST["nombre"];
      $_SESSION['tipo'] = $_POST["tipo"];
      echo "usuario: " . $_SESSION['usuario'] . "<br/>";
      echo "tipo: " . $_SESSION['tipo'] . "<br/>";
      header("Location: pagina_principal.php");
    } else {
      $_SESSION['usuario'] = "invitado";
      $_SESSION['tipo'] == "";
      echo "usuario: " . $_SESSION['usuario'] . "<br/>";
      header("Location: pagina_principal.php");
    }
  }
}

?>

<html>

<head>
  <title>yaptube!</title>
</head>

<body>
  <form method="POST">
    <h1> Registrate </h1><br>
    <label for="id_name">Ingrese su nombre</label><br>
    <input type="text" id="id_name" name="nombre"><br>
    <label for="id_tipo">Ingrese su tipo</label><br>
    <input type="text" id="id_tipo" name="tipo"><br>
    <label for="id_pass">Ingrese su contraseña</label><br>
    <input type="text" id="id_pass" name="password"><br>
    <br><br>
    <input type="submit" value="confirmar">
    <h1> Ya tienes cuenta? </h1><br>
    <label for="id_name_2">Ingrese su nombre</label><br>
    <input type="text" id="id_name_2" name="nombre_2"><br>
    <label for="id_tipo_2">Ingrese su tipo</label><br>
    <input type="text" id="id_tipo_2" name="tipo_2"><br>
    <label for="id_pass_2">Ingrese su contraseña</label><br>
    <input type="text" id="id_pass_2" name="password_2"><br>
    <br><br>
    <input type="submit" value="confirmar">
    <br><br><br>
    <input type="submit" value="entrar como invitado">
  </form>
</body>

</html>
