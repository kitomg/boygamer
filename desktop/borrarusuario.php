<?php 
require_once 'env.php';
require_once 'Usuario.php';

class MiClase {

    public $conn;

    public function __construct() {
        if (is_null($this->conn)) {
            $credenciales = credenciales();
            $this->conn = new mysqli(
                $credenciales['servidor'],
                $credenciales['usuario'],
                $credenciales['contrasena'], 
                $credenciales['base_de_datos']
            );
            if ($this->conn->connect_error) {
                $error = 'Error de conexión: ' . $this->conn->connect_error;
                $this->conn = null;
                die($error);
            }
            echo "Conexion exitosa<br>";
            $this->conn->set_charset('utf8');
        } else {
            echo "Hubo un fallo<br>";
        }
    }

    public function borrar_usuario($conn) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $nombre = $_POST['nombre'];
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            
            $nombre = $conn->real_escape_string($nombre);

            
            $stmt = $conn->prepare("DELETE FROM usuario WHERE Nombre = ?");
            $stmt->bind_param("s", $nombre);

            if ($stmt->execute()) {
                $redirigir = 'proyectofinal.php';
                echo "El usuario '$nombre' a sido eliminado.";
            } else {
                echo "Error al eliminar el usuario: " . $stmt->error;
            }
            header('Location: ' . $redirigir);
            // cierra la conexion
            $stmt->close();
        }
    }
}

$miClase = new MiClase();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $miClase->borrar_usuario($miClase->conn);
}
?>
