<?php
  $conexion = mysqli_connect('localhost', 'root', '', 'sifprueba');
  if (isset($_POST["crearFactura"])) {
<<<<<<< Updated upstream
    
=======
    //tomar datos de cliente
    $idFactura = $_POST["idConsecutivo"];
    $fechaFactura = $_POST["fechaCrearFactura"];
    $cedulaCliente = $_POST["cedulaCrearFactura"];
    $nombreCliente = $_POST["clienteCrearFactura"];

    //Tomar datos de productos
    $articulo = [];
    $cantidad = [];
    $precioUnit = [];
    $subtotalArt = [];
    
    for ($i=0; $i < count($_POST["articulo"]); $i++) { 
      $consultaArticulos = "SELECT * from tbarticulos";
      $resultado = mysqli_query($conexion, $consultaArticulos);

      while($fila = mysqli_fetch_array($resultado)){
        if($fila["Nombre"] == $_POST["articulo"][$i]){
          $articulo[] = $fila["ID"];
        }
      }

      $cantidad[] = $_POST["cantidadArticulo"][$i];
      $precioUnit[] = $_POST["precioArticulo"][$i];
      $subtotalArt[] = $_POST["subtotalArticulo"][$i];
    }

    //Tomar datos de factura
    $descuentoFac = $_POST["descuento"];
    $subtotalFac = $_POST["subtotal"];
    $ivaFac = $_POST["iva"];
    $totalfac = $_POST["total"];

    //inserciones a la basse de datos

    $insercionDatosFactura = "INSERT into tbfacturaventas values ('$idFactura', '$fechaFactura', '$descuentoFac', '$subtotalFac', '$ivaFac', '$totalfac', '112233445-7', '1007856367', '1', '35376605')";

    $ejecutar = mysqli_query($conexion, $insercionDatosFactura) or die ("ingreso de datos fallido");
    if($ejecutar){
      echo "<script>
      alert('Insercion de datos exitosa');
      </script>";
    } else {
      "<script>
        alert('Insercion de datos fallida');
        window.open('../form factura de ventas.php', '_self');
      </script>";
    }

    for ($i=0; $i < count($articulo); $i++) { 
      $insercionFacArt = "INSERT into tbfacturaventasarticulos values ('$idFactura', '$articulo[$i]', '$cantidad[$i]', '$precioUnit[$i]', '$subtotalArt[$i]')";

      $ejecutar = mysqli_query($conexion, $insercionFacArt);
      if (!$ejecutar) {
        echo "<script>
          alert('Insercion de articulos fallida');
        </script>";
      }
    }

    echo "<script>
      alert('Operacion realizada con exito');
      window.open('../form factura de venta.php', '_self');
    </script>";


    // if($ejecutar){
    //   echo"<script>
    //     alert('Insercion de datos realizada');
    //     window.open('../form factura de venta.php', '_self');
    //   </script>";
    // }
>>>>>>> Stashed changes
  }