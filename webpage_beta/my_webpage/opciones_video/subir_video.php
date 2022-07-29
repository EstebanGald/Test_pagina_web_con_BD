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
  $target_dir = "../videos/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $video_name = $_FILES["fileToUpload"]["name"];
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

      $categoria = $_POST["categoria"];
      $duracion = $_POST["duracion"];
      $descripcion = $_POST["descripcion"];
      $titulo = $_POST["titulo"];
      $id_usuario = $_SESSION['usuario'];

      $sql_insert_video = "INSERT INTO video (categoria,duracion,foto_video,descripcion,titulo,id_usuario)
      VALUES ('$categoria','$duracion','$video_name','$descripcion','$titulo','$id_usuario')";
      if ($conn->query($sql_insert_video)) {
        header("Location: video_operacion_exitosa.php");
      } else {
        echo "Error, no se pudo insertar a la base de datos" . "<br/>";
      }

    } else {
      echo "Sorry, there was an error uploading your file.";
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
    <form method="POST" enctype="multipart/form-data">
      <label for="id_file">Video  </label>
      <input type="file" id="id_file" name="fileToUpload"><br>
      <label for="id_titulo">Ingrese titulo del video</label><br>
      <input type="text" id="id_titulo" name="titulo"><br>
      <label for="id_duracion">Ingrese duración del video</label><br>
      <input type="text" id="id_duracion" name="duracion"><br>
      <label for="id_categoria">Ingrese categoría del video</label><br>
      <input type="text" id="id_categoria" name="categoria"><br>
      <label for="id_descripcion">Descripción</label><br>
      <input type="text" id="id_descripcion" name="descripcion"><br>
      <br><br>
      <input type="submit" value="subir video">
    </form>
    <br><br>
    <a href="../pagina_principal.php">volver a pagina principal</a>
  </body>
</html>
