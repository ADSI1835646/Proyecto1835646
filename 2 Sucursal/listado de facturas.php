<!DOCTYPE html>
<html lang="es"> 
  <?php
    $conexion = mysqli_connect('localhost', 'root', '', 'sifprueba');
  ?>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listado de facturas</title>
    <link rel="icon" type="image" href="img/general/favicon.png">
    <link rel="stylesheet" href="css/listado de facturas.css">
  </head>
  <body>
    <div class="contenedor">
      <!-- HEADER -->
      <div class="header">
        <header>
          <a href="#">
            <figure>
              <img src="img/general/sif.png" alt="logo sicon" id="logoCabecera" />
            </figure>
          </a>
          <div id="tituloNav">
            <div id="contenedorH1Usuario">
              <h1>Sistema de Inventario y Facturacion</h1>
              <div id="iniciarSesion">
                <div id="contenedorUsuario">
                  <figure id="figAvatar">
                    <img id="avatar" src="img/general/avatar.png" alt="avatar" />
                  </figure>
                  <p>Sucursal</p>
                  <a href="../../index.html">
                  <input type="button" value="Cerrar sesion"></a>
                </div>
              </div>
            </div>
            <nav id="nav1">
              <ul>
                <li><a href="cliente.php">Gestion de clientes</a></li>
                <li><a href="factura de venta.php">Factura de venta</a></li>
                <li><a href="listado de facturas.php">Revisar facturas</a></li>
                <li><a href="facturas en cola.html">Facturas en cola</a></li>
              </ul>
            </nav>
          </div>
        </header>
        <input type="text" name="" id="linea">
      </div>
      <h2 class="clienteH2">Revisar facturas</h2>  
      <!-- GRILLA -->
      <div class="grilla">
        <form>
          <fieldset>
            <input class="buscar" type="search" name="Buscar factura" id="" placeholder="Buscar factura" autocomplete="transaction-currency"/>
            <div id="contenedorTabla">
              <table>
                <thead>
                  <tr>
                    <th class="tamanioTres"><input type="checkbox" name="" id="" disabled></th> 
                    <th class="tamanioTres">Id</th>
                    <th class="tamanioUno">Cliente</th>
                    <th class="tamanioDos">Fecha</th>
                    <th class="tamanioDos">Descuento</th>
                    <th class="tamanioDos">Subtotal</th>
                    <th class="tamanioDos">Iva</th>
                    <th class="tamanioDos">Total</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $consultaTbFacturas = "SELECT * from tbfacturaventas where NITEmpresa = '112233445-7'";
                    $resultado = mysqli_query($conexion, $consultaTbFacturas);
                    
                    while($fila = mysqli_fetch_array($resultado)){
                      $idFactura = $fila["ID"];
                      $nombreCliente = '';

                      $consultaTbClientes = "SELECT * from tbcliente where NITEmpresa = '112233445-7'";
                      $resultadoClientes = mysqli_query($conexion, $consultaTbClientes);

                      while($fila2 = mysqli_fetch_array($resultadoClientes)){
                        if ($fila2["CedulaCliente"] == $fila["CedulaCliente"]) {
                          $nombreCliente = $fila2["NombreCliente"];
                        }
                      }
                      $fecha = $fila["FECHA"];
                      $descuento = $fila["Descuento"];
                      $subtotal = $fila["Subtotal"];
                      $iva = $fila["IVA"];
                      $total = $fila["Total"];

                      ?>

                      <tr class="cebra">
                      <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                      <td><?php echo $idFactura; ?></td>
                      <td><?php echo $nombreCliente; ?></td>
                      <td><?php echo $fecha; ?></td>
                      <td><?php echo $descuento; ?></td>
                      <td><?php echo $subtotal; ?></td>
                      <td><?php echo $iva; ?></td>
                      <td><?php echo $total; ?></td>
                      </tr>

                      <?php

                    }

                  ?>
                </tbody>
              </table>
            </div>
            <a href="#">
              <img class="exportar" src="img/revisar facturas/revisar facturas.jpg" alt="Detalle de la factura" width="150px">
            </a>
          </fieldset>
        </form>
      </div>
      <!-- FOOTER -->
      <div class="footer">
        <footer>
          <div id="seccionFooter">
            <nav class="navfooter" id="navFooter1">
              <ul>
                <a href="#"><li>Aviso legal</li></a>
                <a href="#"><li>Politicas de privacidad</li></a>
                <a href="#"><li>Politicas de calidad</li></a>
                <a href="#"><li>Politicas de cookies</li></a>
              </ul>
            </nav>
            <div class="imgFooter">
              <figure>
                <div id="seccionImg">
                  <img id="logoFooter" src="img/general/sif.png" alt="Logo Sicon" />
                  <img id="logoRedes" src="img/general/redes.png" alt="Logo Redes.png"  />
                </div>  
              </figure>
            </div>
            <nav class="navfooter" id="navFooter2">
              <ul>
                <a href="#"><li>Sif</li></a>
                <a href="#"><li>Blog</li></a>
                <a href="#"><li>PQR</li></a>
                <a href="#"><li>Contáctenos</li></a>
              </ul>
            </nav>
          </div>
          <p>
          Sif inc International | Cra 9 No 7 a 16(Fusagasuga) COLOMBIA |
          servicioalcliente@sif.com | +57 3115701088
          </p>
        </footer>
      </div>
    </div>
  </body>
</html>
