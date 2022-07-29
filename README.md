# Test_pagina_web_con_BD
El objetivo de este proyecto era aprender sobre la integración de Bases de Datos en una página web usando HTML y PHP.

Este proyecto fue hecho en MySQL en conjunto con phpMyAdmin, para conectarse a la base de datos se usó MAMP, pero también funciona
en XAMPP

#Si está usando MAMP:

-Abrir MAMP y asegurarse que está conectado a Apache Server y MySQL server, esto se ve si los botones a la derecha
se vuelven verdes.
-Presionar botón para ir a la página web de MAMP
-Ir a la pestaña Tools y seleccionar phpMyAdmin
-Importar el archivo .sql a phpMyAdmin
-colocar los archivos .php donde instaló MAMP, dentro de la carpeta htdocs, en nuestro caso es: C:\MAMP\htdocs\
-Finalmente para iniciar la página web, ir a la página web de MAMP y seleccionar la pestaña My Website.

#Si está usando XAMPP:

-ir al archivo conexion.php y verificar que las variables $servername, $username y $password concuerden con el usuario
en la base de datos (a nosotros nos funciono poniendo a $servername = "127.0.0.1")
- ir a pagina web ingresando en el buscador del browser: "localhost/PHP/index.php" 

#Aclaraciones:

-Cuando se desee insertar un video, la imagen insertada se guardará en la carpeta videos
-Solo se permiten imagenes con formato jpg, png o jpeg
-Al eliminar los videos no se pudo eliminar las imagenes asociadas que se encuentran en la carpeta videos
-Para seguir a otro usuario, buscar su nombre en el buscador, ahí se podrá acceder a su perfil y tendrá un botón para
seguirlo
-También se puede acceder al perfil de un usuario al ver un video.
-Se puede acceder a la informacion de usuario con el botón "mi perfil" en la página principal
-Se pueden ver los videos del usuario registrado con el botón "mis videos" 
