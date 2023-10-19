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

public function crear_usuario($conn) {
      // Variables del formulario
$nombre = $_POST['nombre'];
$contrasena = $_POST['contrasena'];
$administrador = isset($_POST['administrador']) ? $_POST['administrador'] : 0;

//  insertar un nuevo usuario
$sql = "INSERT INTO usuario (Nombre, Contrasena, Administrador) VALUES ('$nombre', '$contrasena', $administrador)";

if ($conn->query($sql) === TRUE) {
    $redirigir = 'proyectofinal.php';
    echo "Usuario creado correctamente.";
} else {
    echo "Error al crear el usuario: " . $conn->error;
}
header('Location: ' . $redirigir);
// Para cerrar la conexión a la base de datos
$conn->close();
    }
}

$miClase = new MiClase();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $miClase->crear_usuario($miClase->conn); // habia que pasar  la conexión $conn como argumento
}

?>