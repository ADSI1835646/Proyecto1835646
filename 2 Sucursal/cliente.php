<!DOCTYPE html>
<html lang="es"> 

<?php
  $conexion = mysqli_connect('localhost', 'root', '', 'sifprueba');
?>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clientes</title>
    <link rel="icon" type="image" href="img/general/favicon.png">
    <link rel="stylesheet" href="css/cliente.css">
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
                <li><a href="listado de facturas.php">Listado de facturas</a></li>
                <li><a href="facturas en cola.html">Facturas en cola</a></li>
              </ul>
            </nav>
          </div>
        </header>
        <input type="text" name="" id="linea">
      </div>
      <!-- CREAR CLIENTE -->
      <form action="conex/crearCliente.php" class="formCliente" method="post">
        <h2 class="clienteH2">Clientes</h2>  
        <h3>Datos del Cliente</h3> 
        <div class="formulario1">
          <div id="seccionUno">
            <div class="elementosInternos">
              <label for="NoIdentificacion">Cedula *</label>
              <input type="text" name="NoIdentificacion" id="NoIdentificacion" class="tamanioDos">
            </div>
            <div class="elementosInternos">
              <label for="RazonSocial">Nombre del cliente *</label>
              <input type="text" name="RazonSocial" id="RazonSocial" class="tamanioUno">
            </div>
          </div>
          
          <div id="seccionDos">
            <div class="elementosInternos">
              <label for="Direccion">Direccion *</label>
              <input type="text" name="Direccion" id="Direccion" class="tamanioUno">
            </div>
            <div class="elementosInternos">
              <label for="Telefono1">Telefono *</label>
              <input type="text" name="Telefono1" id="Telefono1" class="tamanioDos">
            </div>
          </div>

        </div>
        <div class="botones">
          <input type="submit" value="Crear Cliente" class="boton" name="CrearCliente">
        </div>
      </form>
      <!-- GRILLA -->
      <div class="grilla">
        <form>
          <fieldset>
            <input class="buscar" type="search" name="Buscar usuario" id="" placeholder="Buscar usuario" autocomplete="transaction-currency"/>
            <div id="contenedorTabla">
              <table>
                <thead>
                  <tr>
                    <th class="tablaTamanioTres"><input type="checkbox" name="" id="" disabled></th> 
                    <th class="tablaTamanioDos">Cedula</th>
                    <th class="tablaTamanioUno">Nombre del cliente</th>
                    <th class="tablaTamanioUno">Direccion</th>
                    <th class="tablaTamanioDos">Telefono</td>
                  </tr>
                </thead>
                <tbody>

                  <?php
                    $consultaClientes = "SELECT * FROM tbcliente";
                    $resultado = mysqli_query($conexion, $consultaClientes);

                    while ($fila = mysqli_fetch_array($resultado)) {

                      ?>
                        <tr class="cebra">
                          <td class="stickyId"><input type="checkbox" name="" id=""></td>
                          <td><?php echo $fila["CedulaCliente"]; ?></td>
                          <td><?php echo $fila["NombreCliente"]; ?></td>
                          <td><?php echo $fila["DireccionCliente"]; ?></td>
                          <td><?php echo $fila["TelefonoCliente"]; ?></td>
                        </tr>
                      <?php
                    }
                  ?>
                  
                </tbody>
              </table>
            </div>
            <a href="#">
              <img class="exportar" src="img/cliente/eliminar cliente.jpg" alt="Eliminar cliente" width="150px">
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
