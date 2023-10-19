<?php
require_once 'env.php';
require_once 'Videojuegos.php';
require_once 'Usuario.php';

class RepositorioVideojuego
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

   

    public function save(Videojuegos $v)
    {

        //$query = $this->conn->prepare($q);
        
        $CODIGO             = $v->getCODIGO();
        $NOMBRE             = $v->getNOMBRE();
        $FECHA_LANZAMIENTO  = $v->getFECHA_LANZAMIENTO();
        $COMPANIA           = $v->getCOMPANIA();
        $PLATAFORMA         = $v->getPLATAFORMA();
        $GENERO             = $v->getGENERO();
        $LINK               = $v->getLINK();

        $q = "INSERT INTO juegos (CODIGO, NOMBRE, FECHA_LANZAMIENTO, COMPANIA, PLATAFORMA, GENERO, LINK) ";
        $q .= "VALUES (null, '".$NOMBRE."', '".$FECHA_LANZAMIENTO."', ".$COMPANIA.", ".$PLATAFORMA.", ".$GENERO.", '".$LINK."')";

       
       //  die($q);
    //     try {
    //         $this->conn->query($q);
    //         return true;
    //     } catch (\Throwable $th) {
    //         die($th->getMessage());
    //     }

        if ($this->conn->query($q)) {
           return true;
        } else {
            return false; 
        }
    }

    public function filtrar(genero $g){
        $q = "SELECT * FROM genero WHERE genero = '".$GENERO."'";
        $query = $this->conn->prepare($q);
        if ($this->conn->query($q)) {
            return true;
        } else {
            return false;
        }
        
    }

   
    public function eliminar(juego $j)
    {
        $q = "DELETE FROM videojuegos  WHERE CODIGO = ?";
        $query = $this->conn->prepare($q);

        $CODIGO = $j->getCODIGO(); // Cambié $l a $j

         // Cambié "d" a "i"   + posible error

        if ($this->conn->query($q)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_plataformas() {
        $sql = "SELECT ID_Plataforma, Nombre FROM plataforma";
        $query = $this->conn->prepare($sql);
        $plataformas = [];
        if ($query->execute()) {
            $query->bind_result($id, $nombre);
            $plataformas = [];
            while ($query->fetch()) {
                $plataformas[] = ['id' => $id, 'nombre'=>$nombre];
            }             
        }
        return $plataformas;
    }

  
    public function get_all_compania() {
        $sql = "SELECT ID_Compania, Nombre FROM compania";
        $query = $this->conn->prepare($sql);
        $compania = [];
        if ($query->execute()) {
            $query->bind_result($id, $nombre);
            $compania = [];
            while ($query->fetch()) {
                $compania[] = ['id' => $id, 'nombre'=>$nombre];
            }             
        }
        return $compania;
    }     
    
    public function get_all_genero() {
        $sql = "SELECT ID_Genero, Tematica FROM genero";
        $query = $this->conn->prepare($sql);
        $genero = [];
        if ($query->execute()) {
            $query->bind_result($id, $nombre);
            $genero = [];
            while ($query->fetch()) {
                $compania[] = ['id' => $id, 'nombre'=>$nombre];
            }             
        }
        return $compania;
    }   
        

        
}
