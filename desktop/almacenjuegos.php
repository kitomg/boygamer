<?php
require_once 'almacenjuegos.php'; 
require_once 'Videojuegos.php';
require_once 'env.php';

// Crear una instancia de RepositorioVideojuego
$almacenjuego = new almacenjuego();

// trae la lista de videojuegos cargados
$videojuegos = $almacenjuego->getAll(); 

class almacenjuego
{
    private $conn;

    public function __construct()
    {
        if (is_null($this->conn)) {
            $credenciales = credenciales();
            $this->conn = new mysqli(
                $credenciales['servidor'],
                $credenciales['usuario'],
                $credenciales['contrasena'], // Cambié 'clave' a 'contrasena'
                $credenciales['base_de_datos']
            );
            if ($this->conn->connect_error) {
                $error = 'Error de conexión: ' . $this->conn->connect_error;
                $this->conn = null;
                die($error);
            }
            // echo "Conexion exitosa<br>";
            $this->conn->set_charset('utf8');
        } else {
            echo "Hubo un fallo<br>";
        }
    }

    public function getAll($compania = null, $plataforma = null, $genero = null)
    {
        $videojuegos = array();
    
        
        $query = "SELECT
          juegos.CODIGO,
          juegos.NOMBRE,
          juegos.FECHA_LANZAMIENTO,
          juegos.LINK,
          compania.NOMBRE AS COMPANIA,
          plataforma.Nombre AS PLATAFORMA,
          genero.Tematica AS GENERO

        FROM
          juegos
        INNER JOIN
          compania ON juegos.COMPANIA = compania.ID_Compania
        INNER JOIN
          plataforma ON juegos.PLATAFORMA = plataforma.ID_Plataforma
        INNER JOIN
          genero ON juegos.GENERO = genero.ID_Genero";
       
    
        
        $where = array();
    
        if ($compania !== null) {
            $where[] = "COMPANIA = '$compania'";
        }
    
        if ($plataforma !== null) {
            $where[] = "PLATAFORMA = '$plataforma'";
        }
    
        if ($genero !== null) {
            $where[] = "GENERO = '$genero'";
        }
    
        
        if (!empty($where)) {
            $query .= " WHERE " . implode(" AND ", $where);
        }
    
        
        $result = $this->conn->query($query);
    
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $videojuego = new Videojuegos(
                    $row['CODIGO'],
                    $row['NOMBRE'],
                    $row['FECHA_LANZAMIENTO'],
                    $row['COMPANIA'],
                    $row['PLATAFORMA'],
                    $row['GENERO'],
                    $row['LINK']
                );
                $videojuegos[] = $videojuego;
            }
        } else {
            
            echo "Error en la consulta: " . $this->conn->error;
        }
    
        return $videojuegos;
    }
  }    
    ?>


  

