<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear factura</title>
    <link rel="icon" type="image" href="img/general/favicon.png">
    <link rel="stylesheet" href="css/form crear factura-despacho.css">
  </head>
  <body>
    <form action="">
      <div class="contenedor">
        <div class="form">
          <h2>Crear factura</h2>
          <div id="h3DerechaCreaFactura">
            <div id="h3Subtitulo">
              <h3 id="titu">Datos de la factura</h3>
            </div>
            <div id="derecha">
              <label for="idConsecutivo">ID:</label>
              <input type="text" name="idConsecutivo" id="idConsecutivo" placeholder="004" readonly>
            </div>
          </div>
          <!-- FORMULARIO -->
          <div id="formulario">
            <fieldset id="fieldset1">
              <legend>Datos del proveedor</legend>
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
                  <select name="clienteCrearFactura" id="clienteCrearFactura" class="tamanioUno">
                    <option value="">Seleccione un cliente</option>
                    <option value="">Cliente 1</option>
                    <option value="">Cliente 2</option>
                    <option value="">Cliente 3</option>
                  </select>
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
                  <select name="fromArticulo" id="fromArticulo" class="tamanioUno">
                    <option value="Seleccione">Seleccione</option>
                    <option value="Cemento">Cemento</option>
                    <option value="Ladrillo">Ladrillo</option>
                    <option value="Varilla">Varilla</option>
                    <option value="Alambre">Alambre</option>
                    <option value="Baldosa">Baldosa</option>
                    <option value="Pegante">Pegante</option>
                  </select>
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
          <h3 class="subtitulos">Factura de venta</h3>
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
                <input type="text" name="descuento" id="descuento" disabled>
              </div>
              <div>
                <label for="subtotal">Subtotal</label>
                <input type="text" name="subtotal" id="subtotal" disabled>
              </div>
              <div>
                <label for="iva">Iva</label>
                <input type="text" name="iva" id="iva" disabled>
              </div>
              <div>
                <label for="total" class="labelTotal">Total</label>
                <input type="text" name="total" id="total" disabled>
              </div>
            </div>
          </div>
          <hr>
          <!-- BOTONES -->
          <div id="botonesCrearFactura">
            <input type="button" value="Crear factura" class="boton"/>
            <input type="button" value="Cancelar" class="boton"/>
          </div>
        </div>
      </div>
      <script src="js/agregar producto.js" charset="UTF-8"></script>
    </form>
  </body>
</html>