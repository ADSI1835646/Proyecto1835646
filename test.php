
<?php
  $conexion = mysqli_connect('localhost', 'root', '', 'sifprueba');
  $consulta = "SELECT * from tbproveedores";
  $resultado = mysqli_query($conexion, $consulta);
  $fila = mysqli_fetch_array($resultado);+
  var_dump($fila["Nombre"]);