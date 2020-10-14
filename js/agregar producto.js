var cont = 1;
function agregarProducto() {

  var incremental = 1;
  var articulo = document.getElementById("fromArticulo");
  var cantidad = document.getElementById("fromCantidad");
  var precio = document.getElementById("fromPrecio");
  var subtotal = Number(cantidad.value) * Number(precio.value);
  var datos = document.getElementById("tablaProducto");
  
  datos.innerHTML = datos.innerHTML +
  `<tr class="azul">
  <td><input type="hidden" name="incremental[]" value="${incremental}">${cont++}</td>
  <td>${articulo.value}</td>
  <td>${cantidad.value}</td>
  <td>${precio.value}</td>
  <td name="subtotal">${subtotal}</td>
  <td><a href="#" onclick="eliminarArticulo(this)"><img src="img/general/trash.png" alt="Boton eliminar" id="eliminar"></a></td>
  </tr>`;

  calcularTotales();
  limpiarCampos();
}

function calcularTotales() {
  var subtotales = document.getElementsByName("subtotal");
  var dto = document.getElementById("descuentoCrearFactura");
  var ivaaa = 0.19;
  var sumaSubtotales = 0;
  
  for (var i = 0; i < subtotales.length; i++) {
    sumaSubtotales = sumaSubtotales + Number(subtotales[i].innerHTML);
  }
  
  var valorDto = sumaSubtotales * (Number(dto.value)/100);
  var subtotalll = sumaSubtotales - valorDto;
  var valorIva = subtotalll * ivaaa;
  var totalFactura = subtotalll + valorIva;

  descuento.value = valorDto.toLocaleString("es-MX");
  subtotal.value = subtotalll.toLocaleString("es-MX");
  iva.value = valorIva.toLocaleString("es-MX");
  total.value = totalFactura.toLocaleString("es-MX");
}

function eliminarArticulo(eliminarFila){
  var fila = eliminarFila.parentElement.parentElement.remove();
  calcularTotales();
}
function limpiarCampos(){
  fromArticulo.value = "";
  fromCantidad.value = "";
  fromPrecio.value = "";
}