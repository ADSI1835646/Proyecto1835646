<!DOCTYPE html>
<html lang="es"> 

<?php
  $conexion = mysqli_connect('localhost', 'root', '', 'sifprueba');
?>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventario</title>
    <link rel="icon" type="image" href="img/general/favicon.png">
    <link rel="stylesheet" href="css/inventario.css">
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
                  <p>Bodega</p>
                  <a href="../../index.html">
                  <input type="button" value="Cerrar sesion"></a>
                </div>
              </div>
            </div>
            <nav id="nav1">
              <ul>
                <li><a href="inventario.php">Gestion de Inventario</a></li>
                <li><a href="proveedor.html">Gestion de proveedores</a></li>
                <li><a href="factura de compra.html">Factura de compra</a></li>
                <li><a href="alertas.html">Alertas</a></li>
              </ul>
            </nav>
          </div>
        </header>
        <input type="text" name="" id="linea">
      </div>
      <!-- CREAR CLIENTE -->
      <form action="" class="formCliente">
        <h2 class="clienteH2">Articulos</h2>  
        <h3>Datos del Articulo</h3> 
        <div class="formulario1">
          <div id="seccionUno">
            <div class="elementosInternos">
              <label for="NoIdentificacion">Referencia *</label>
              <input type="text" name="NoIdentificacion" id="NoIdentificacion" class="tamanioDos">
            </div>
            <div class="elementosInternos">
              <label for="RazonSocial">Nombre del articulo *</label>
              <input type="text" name="RazonSocial" id="RazonSocial" class="tamanioUno">
            </div>
            <div class="elementosInternos">
              <label for="RazonSocial">Descripcion/Marca *</label>
              <input type="text" name="RazonSocial" id="RazonSocial" class="tamanioUno">
            </div>
          </div>
          
          <div id="seccionDos">
            <div class="elementosInternos">
              <label for="Telefono1">Precio Unitario *</label>
              <input type="text" name="Telefono1" id="Telefono1" class="tamanioDos">
            </div>
            
            <div class="elementosInternos">
              <label for="Direccion">Stock minimo </label>
              <input type="text" name="Direccion" id="Direccion" class="tamanioDos">
            </div>
          </div>

        </div>
        <div class="botones">
          <input type="submit" value="Crear Articulo" class="boton">
        </div>
      </form>
      <!-- GRILLA -->
      <div class="grilla">
        <form>
          <fieldset>
            <input class="buscar" type="search" name="Buscar Articulos" id="" placeholder="Buscar Articulos" autocomplete="transaction-currency"/>
            <div id="contenedorTabla">
              <table>
                <thead>
                  <tr>
                    <th class="tablaTamanioTres"><input type="checkbox" name="" id="" disabled></th> 
                    <th class="tablaTamanioDos">Referencia</th>
                    <th class="tablaTamanioUno">Nombre del articulo</th>
                    <th class="tablaTamanioUno">Descripcion</th>
                    <th class="tablaTamanioDos">Precio Unitario</th>
                    <th class="tablaTamanioDos">Stock minimo</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                    $consultaArticulos = "SELECT * FROM tbarticulos where NITEmpresa = '112233445-7'";
                    $ejecucion = mysqli_query($conexion, $consultaArticulos);
                    
                    while ($fila = mysqli_fetch_array($ejecucion)) {
                      $stock = '';
                      $precio = '';
                      $consultaInventario = "SELECT * from tbinventario where NITEmpresa = '112233445-7'";
                      $ejecucion2 = mysqli_query($conexion, $consultaInventario);
                      while($fila2 = mysqli_fetch_array($ejecucion2)) {
                        if($fila["ID"] == $fila2["IDArticulo"]) {
                          $stock = $fila2["StockMin"];
                          $precio = $fila2["Precio"];
                        }
                      }

                      ?>  
                        <tr class="cebra">
                          <td class="stickyId"><input type="checkbox" name="" id=""></td>
                          <td><?php echo $fila["Referencia"];?></td>
                          <td><?php echo $fila["Nombre"];?></td>
                          <td><?php echo $fila["Descripcion"];?></td>
                          <td><?php echo $precio;?></td>
                          <td><?php echo $stock?></td>
                        </tr>
                      <?php

                    }
                  ?>

                  <!-- <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p2045</td>
                    <td>Pan Bimbo integral</td>
                    <td>Grupo Bimbo</td>
                    <td>3000</td>
                    <td>22%</td>
                    <td>100</td>
                  </tr>
                  <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p2089</td>
                    <td>Gaseosa Ponimalta litro</td>
                    <td>Postobon</td>
                    <td>3500</td>
                    <td>18%</td>
                    <td>50</td>
                  </tr>
                  <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p3045</td>
                    <td>Harina de trigo Haz de Oro libra</td>
                    <td>Harinas del Valle</td>
                    <td>1800</td>
                    <td>30%</td>
                    <td>150</td>
                  </tr>
                  <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p4530</td>
                    <td>Margarina la fina 500g</td>
                    <td>Nestle</td>
                    <td>4000</td>
                    <td>26%</td>
                    <td>80</td>
                  </tr>
                  <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p8730</td>
                    <td>Azucar kilo</td>
                    <td>Ingenio Azucarero</td>
                    <td>1600</td>
                    <td>12%</td>
                    <td>200</td>
                  </tr>
                  <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p2045</td>
                    <td>Pan Bimbo integral</td>
                    <td>Grupo Bimbo</td>
                    <td>3000</td>
                    <td>22%</td>
                    <td>100</td>
                  </tr>
                  <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p2089</td>
                    <td>Gaseosa Ponimalta litro</td>
                    <td>Postobon</td>
                    <td>3500</td>
                    <td>18%</td>
                    <td>50</td>
                  </tr>
                  <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p3045</td>
                    <td>Harina de trigo Haz de Oro libra</td>
                    <td>Harinas del Valle</td>
                    <td>1800</td>
                    <td>30%</td>
                    <td>150</td>
                  </tr>
                  <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p4530</td>
                    <td>Margarina la fina 500g</td>
                    <td>Nestle</td>
                    <td>4000</td>
                    <td>26%</td>
                    <td>80</td>
                  </tr>
                  <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p8730</td>
                    <td>Azucar kilo</td>
                    <td>Ingenio Azucarero</td>
                    <td>1600</td>
                    <td>12%</td>
                    <td>200</td>
                  </tr>
                  <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p2045</td>
                    <td>Pan Bimbo integral</td>
                    <td>Grupo Bimbo</td>
                    <td>3000</td>
                    <td>22%</td>
                    <td>100</td>
                  </tr>
                  <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p2089</td>
                    <td>Gaseosa Ponimalta litro</td>
                    <td>Postobon</td>
                    <td>3500</td>
                    <td>18%</td>
                    <td>50</td>
                  </tr>
                  <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p3045</td>
                    <td>Harina de trigo Haz de Oro libra</td>
                    <td>Harinas del Valle</td>
                    <td>1800</td>
                    <td>30%</td>
                    <td>150</td>
                  </tr>
                  <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p4530</td>
                    <td>Margarina la fina 500g</td>
                    <td>Nestle</td>
                    <td>4000</td>
                    <td>26%</td>
                    <td>80</td>
                  </tr>
                  <tr class="cebra">
                    <td class="stickyId"><input type="checkbox" name="" id=""></td> 
                    <td>p8730</td>
                    <td>Azucar kilo</td>
                    <td>Ingenio Azucarero</td>
                    <td>1600</td>
                    <td>12%</td>
                    <td>200</td>
                  </tr> -->
                </tbody>
              </table>
            </div>
            <div class="botonesAccion">
              <a href="#">
                <img class="exportar" src="img/articulo/Modificar articulo.jpg" alt="Modificar Articulo" width="150px">
              </a>
              <a href="#">
                <img class="exportar" src="img/articulo/Eliminar articulo.jpg" alt="Eliminar Articulo" width="150px">
              </a>
              <a href="#">
                <img class="exportar" src="img/articulo/Importar desde excel.jpg" alt="Importar desde excel" width="150px">
              </a>
            </div>
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
