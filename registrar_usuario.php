<?php 
require 'funciones.php'; // Asegúrate de que este archivo contiene la clase Usuario y está incluido correctamente
require 'conexionn.php'; // Asegúrate de que este archivo contiene la conexión a la base de datos y está incluido correctamente

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"]; // Asegúrate de que el nombre del campo en el formulario sea "apellido"
    $correo_electronico = $_POST["correo"]; // Asegúrate de que el nombre del campo en el formulario sea "correo"
    $contrasena = $_POST["contrasena"];

    // Crear un objeto Usuario utilizando la conexión a la base de datos
    $funciones = new Usuario($conexion); // Usar el nombre correcto de la variable de conexión

    if ($funciones->agregarUsuario($nombre, $apellido, $correo_electronico, $contrasena)) {
        // El usuario se agregó correctamente, redirecciona a la lista de usuarios
        header("Location: registrar.html");
        exit();
    } else {
        // Hubo un error al agregar el usuario, muestra un mensaje de error
        echo "Error al agregar el usuario.";
    }
}
else {
    echo "Error al agregar el usuario.";
}
?>
