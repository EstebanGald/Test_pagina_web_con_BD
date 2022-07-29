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

?>

<html>
  <head>
    <meta charset = "utf-8">
    <title>!Yaptube</title>
  </head>
  <body>
    <h1>¡La lista de reproduccion fue creada con éxito!</h1>
    <p>Puedes buscar videos en el buscador para agregarlos a tu lista de reproduccion:</p><br><br>
    <form method="post" action="../resultado_busqueda.php" >
      <p>
        Busqueda de videos: <input type="search" name="buscar"
        placeholder="videos...">
        <input type="submit" value="Buscar">
      </p>
    </form>
    <br><br>
    <a href="../pagina_principal.php">volver a pagina principal</a>
  </body>
</html>
