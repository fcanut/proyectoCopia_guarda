<?php
include 'conexionn.php';

class Usuario {
    private $conexionn;

    public function __construct($conexionn) {
        $this->conexionn = $conexionn;
    }

    public function agregarUsuario($nombre, $apellido, $correo_electronico, $contrasena) {
        $query = "INSERT INTO registro_usuarios (nombre, apellido, correo_electronico, contrasena_hash) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexionn->prepare($query);
        $stmt->bind_param("ssss", $nombre, $apellido, $correo_electronico, $contrasena);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al agregar usuario: " . $stmt->error;
            return false;
        }
    }
}
?>
