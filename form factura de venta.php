<!DOCTYPE html>
<html lang="es">
<?php
  $conexion = mysqli_connect('localhost', 'root', '', 'sifprueba');
  include "funciones/func.php";
  
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura de venta</title>
    <link rel="icon" type="image" href="img/general/favicon.png">
    <link rel="stylesheet" href="css/form crear factura-despacho.css">
  </head>
  <body>
    <form method="post" action="conex/inserDatosFacturaVenta.php">
      <div class="contenedor">
        <div class="form">
          <h2>Factura de venta</h2>
          <div id="h3DerechaCreaFactura">
            <div id="h3Subtitulo">
              <h3 id="titu">Datos de la factura</h3>
            </div>
            <div id="derecha">
              <label for="idConsecutivo">ID:</label>
              <?php
                $consultaFactura = "SELECT * from tbfacturaventas";
                $resultado = mysqli_query($conexion, $consultaFactura);
                $idFactura = '';

                while($fila = mysqli_fetch_array($resultado)) {
                  $idFactura = $fila["ID"];
                }
                $idFactura++;
              ?>
              <input type="text" name="idConsecutivo" id="idConsecutivo" value="<?php echo $idFactura; ?>" readonly>
            </div>
          </div>
          <!-- FORMULARIO -->
          <div id="formulario">
            <fieldset id="fieldset1">
              <legend>Datos del cliente</legend>
              <div class="seccion">
                <div>
                  <label for="fechaCrearFactura">Fecha</label>
                  <input type="date" name="fechaCrearFactura" id="fechaCrearFactura" class="tamanioDos">
                </div>
                <div>
                  <label for="NoReferenciaCrearFactura">Cedula</label>
                  <input type="text" name="cedulaCrearFactura" id="cedulaCrearFactura" value="" class="tamanioDos">
                </div>
                <div>
                  <label for="clienteCrearFactura">Cliente</label>
                  <input type="search" name="clienteCrearFactura" id="clienteCrearFactura" class="tamanioUno" list="listaClientes" placeholder="Seleccione un cliente">
                  <datalist id="listaClientes">
                    <?php
                      $consultaClientes = "SELECT * from tbcliente";
                      $resultado = mysqli_query($conexion, $consultaClientes);

                      while($fila = mysqli_fetch_array($resultado)){
                        ?>
                          <option value="<?php echo $fila["NombreCliente"]; ?>"><?php echo $fila["NombreCliente"]; ?></option>
                        <?php
                      }
                    ?>
                  </datalist>
                </div>
                <div>
                  <label for="descuentoCrearFactura">Descuento</label>
                  <input type="text" name="descuentoCrearFactura" id="descuentoCrearFactura" class="tamanioTres">
                  <span> %</span>
                </div>
              </div>
            </fieldset>
            <fieldset id="fieldset2">
              <legend>Datos del producto</legend>
              <div class="seccion">
                <div>
                  <label for="fromArticulo">Articulo</label>
                  <input type="search" name="fromArticulo" id="fromArticulo" class="tamanioUno" list="listaArticulos" placeholder="Seleccione un articulo">
                  <datalist id="listaArticulos">
                  <?php
                      $consultaClientes = "SELECT * from tbarticulos";
                      $resultado = mysqli_query($conexion, $consultaClientes);

                      while($fila = mysqli_fetch_array($resultado)){
                        ?>
                          <option value="<?php echo $fila["Nombre"]; ?>"><?php echo $fila["Nombre"]; ?></option>
                        <?php
                      }
                    ?>
                  </datalist>
                </div>
                
                <div>
                  <label for="fromCantidad">Cantidad</label>
                  <input type="number" name="fromCantidad" id="fromCantidad" value="" class="tamanioDos">
                </div>
                <div>
                  <label for="fromPrecio">Precio Unitario</label>
                  <input type="text" name="fromPrecio" id="fromPrecio" value="" class="tamanioDos">
                </div>
                <div>
                  <label for=""></label>
                  <input type="button" value="Agregar producto" class="boton" onclick="agregarProducto()"></div>
              </div>
            </fieldset>
          </div >
          <!-- GRILLA -->
          <h3 class="subtitulos">Crear factura</h3>
          <div class="grilla">
            <table>
              <thead>
                <tr>
                  <th>No</th>
                  <th>Articulo Producto</th>
                  <th>Cantidad</th>
                  <th>Precio unitario</td>
                  <th>Subtotal</th>
                  <th>-</th>
                </tr>
              </thead>
              <tbody id="tablaProducto">
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- NUEVO PRODUCTO - TOTALES -->
          <hr>
          <div id="totalesCrearFactura">
            <div id="seccion1TotalesCrearFactura">
              <label for=""></label>
            </div>
            <div id="seccion2TotalesCrearFactura">
              <div>
                <label for="descuento">Descuento</label>
                <input type="text" name="descuento" id="descuento" readonly>
              </div>
              <div>
                <label for="subtotal">Subtotal</label>
                <input type="text" name="subtotal" id="subtotal" readonly>
              </div>
              <div>
                <label for="iva">Iva</label>
                <input type="text" name="iva" id="iva" readonly>
              </div>
              <div>
                <label for="total" class="labelTotal">Total</label>
                <input type="text" name="total" id="total" readonly>
              </div>
            </div>
          </div>
          <hr>
          <!-- BOTONES -->
          <div id="botonesCrearFactura">
            <input type="submit" value="Crear factura" name="crearFactura" class="boton"/>
            <input type="button" value="Cancelar" class="boton"/>
          </div>
        </div>
      </div>
      <script src="js/agregar producto.js" charset="UTF-8"></script>
    </form>
  </body>
</html>