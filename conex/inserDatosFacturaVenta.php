<?php
  $conexion = mysqli_connect('localhost', 'root', '', 'sifprueba');
  if (isset($_POST["crearFactura"])) {
    $idFactura = $_POST["idConsecutivo"];
    $fechaFactura = $_POST["fechaCrearFactura"];
    $cedulaCliente = $_POST["cedulaCrearFactura"];
    $nombreCliente = $_POST["clienteCrearFactura"];

    //Tomar datos de productos
    var_dump($_POST["articulo"]);

    // $articulo = $_POST["articulo"];
    // var_dump($articulo);
  }