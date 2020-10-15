function validacion_inicio_sesion() {
  campo1 = document.getElementById("campo1");
  campo2 = document.getElementById("campo2");

  if (campo1.value  == "" || campo1.value == null) {
    alert("El siguiente campo está vacío: Nombre de usuario");
    campo1.focus();
    return false;
  } else if (campo2.value == "" | campo2.value == null) {
    alert("El siguiente campo está vacío: Contraseña");
    campo2.focus();
    return false;
  }
  // alert("Inicio de sesión satisfactorio");
  
}