
<!-- Andrel Fuentes Torres
26 de mayo de 2022
Prof. Corrada
CCOM4027-001 -->

<html>
<!-- cambiar el background de color -->
<body style="background-color:powderblue;">
<!-- cambiar los bordes de la tabla a usar -->
<table border = "2">
<head>
  <!-- hacer clases o divisiones para el estilo de la pagina -->
  <style>

       .button {
              height: 19px;
              width: 45px;
              background-color: #1c87c9;
              box-shadow: 0 5px 0 #105cad;
              color: white;
              padding: 1em 1.5em;
              position: relative;
              text-decoration: none;
              display: inline-block;
              font-size: 15px;
              text-align: center;
              vertical-align: middle;
       }

       .button2 {
              height: 19px;
              width: 140px;
              background-color: #1c87c9;
              box-shadow: 0 5px 0 #105cad;
              color: white;
              padding: 1em 1.5em;
              position: relative;
              text-decoration: none;
              display: inline-block;
              font-size: 15px;
              text-align: center;
              vertical-align: middle;
       }

  </style>
  </head>

  <br>
  <!-- hacer referencia al inicio de la pagina en forma de boton -->
  <a href="index.html" class="button">Inicio</a>

  <br><br><br>

<!-- empieza codigo en php -->
<?php

// definir la informacion necesaria para entrar a la base de datos
$host = '';
$database = '';
$user = '';
$password = '';

// tratar de hacer una conexion al servidor de la base de datos
try
{
  $connection = mysqli_connect($host, $user, $password, $database) or $error = 1;
}
catch (Exception $ex){
  print ("Error: " . $ex->getMessage()) and die();
}

// definir cual sera el query que enviar a la base de datos
$query = "select * from mascota;";
// mandar el query y recibir la respuesta de dicho query
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_execute($stmt);

$res = mysqli_stmt_get_result($stmt);

// crear las divisiones de la tabla
print "<tr>";
print "<th>";
print "Nombre";
print "</th>";
print "<th>";
print "Raza";
print "</th>";
print "<th>";
print "Edad";
print "</th>";
print "<th>";
print "Servicio Frecuente";
print "</tr>\n";

// desplegar en la tabla la informacion recibida (respuesta) del query
while ($data = mysqli_fetch_array($res)){

  print "<tr>";
  print "<td>";
  print $data[0];

  print "</td>";
  print "<td>";
  print $data[1];

  print "</td>";
  print "<td>";
  print $data[2];
  print "</td>";
  print "<td>";

  // añadir la letra ñ a ciertas palabras de la respuesta del query
  if ($data[3] == 'Bano'){
    print "Ba&ntilde;o";
  }
  else if ($data[3] == 'Bano y corte de unas'){
    print "Ba&ntilde;o y corte de u&ntilde;as";
  }
  else {
    print $data[3]; }
  print "</td>";
  print "</tr>\n";
}
// termina codigo en php
?>
</table>
</body>
</html>
