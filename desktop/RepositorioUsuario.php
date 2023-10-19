<?php
require_once 'env.php';
require_once 'Usuario.php';

class RepositorioUsuario
{
    public $conn;

    public function __construct()
    {
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

    public function login($nombre_usuario, $contrasena)
    {
        if ($this->conn->connect_error) {
            die("Conexión a la base de datos fallida: " . $this->conn->connect_error);
        }

        // Evitar SQL Injection: Usar sentencias preparadas
        $sql = "SELECT * FROM usuario WHERE Nombre=? AND Contrasena=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $nombre, $contrasena);

        $nombre = $nombre_usuario;
        $contrasena = $contrasena;

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            
            $usuario = $result->fetch_assoc();
            $nombre_usuario = $usuario['Nombre'];
            $es_admin = $usuario['Administrador'];
            $_SESSION['nombre'] = $nombre_usuario;
$_SESSION['es_admin'] = $es_admin;
            // Redirige a principal.php y pasa el nombre de usuario en la URL
            header("Location: principal.php?nombre=" . $nombre_usuario . "&es_admin=" . $es_admin);
            exit();
        } else {
            // Las credenciales son incorrectas, muestra un mensaje de error.
            echo "Inicio de sesión fallido. Por favor, verifica tus credenciales.";
        }
    }

    public function save(usuario $u, $contrasena)
{
    $q = "INSERT INTO usuario (Nombre_usuario, Nombre, Contrasena, Administrador) ";
    $q .= "VALUES (?, ?, ?, ?";
    $query = $this->conn->prepare($q);

    if (!$query) {
        echo "Error de preparación: " . $this->conn->error;
        return false;
    }

    $usuario = $u->getNombreUsuario();
    $nombre = $u->getNombre();
    $administrador = $u->getAdministrador();
    $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

    $query->bind_param("sssi", $usuario, $nombre, $contrasenaHash, $administrador);

    if ($query->execute()) {
        return $this->conn->insert_id;
    } else {
        echo "Error al ejecutar la consulta: " . $query->error;
        return false;
    }
}

public function actualizar(usuario $u)
{
    $q = "UPDATE usuario ";
    $q .= "SET Nombre_usuario = ?, Nombre = ?, Administrador = ?";
    $q .= "WHERE Id = ?";
    $query = $this->conn->prepare($q);

    if (!$query) {
        echo "Error de preparación: " . $this->conn->error;
        return false;
    }

    $nombre_usuario = $u->getNombreUsuario();
    $nombre = $u->getNombre();
    $administrador = $u->getAdministrador();
    $id = $u->getId();

    $query->bind_param("ssdi", $nombre_usuario, $nombre, $administrador, $id);

    if ($query->execute()) {
        return true;
    } else {
        echo "Error al ejecutar la consulta: " . $query->error;
        return false;
    }
}

public function eliminar(usuario $u)
{
    $q = "DELETE FROM usuario WHERE Id = ?";
    $query = $this->conn->prepare($q);

    if (!$query) {
        echo "Error de preparación: " . $this->conn->error;
        return false;
    }

    $id = $u->getId();

    $query->bind_param("i", $id);

    if ($query->execute()) {
        return true;
    } else {
        echo "Error al ejecutar la consulta: " . $query->error;
        return false;
    }
}
}

