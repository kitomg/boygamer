<?php
class Usuario
{
    protected $id;
    protected $nombre_usuario;
    protected $nombre;
    protected $administrador;
    protected $contrasena;
    public function __construct($nombre_usuario, $nombre)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->nombre_usuario = $nombre_usuario;
        $this->contrasena = $contrasena;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNombre_usuario()
    {
        return $this->nombre_usuario;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setDatos($nombre_usuario, $nombre)
    {
        $this->nombre_usuario = $nombre_usuario;
        $this->nombre = $nombre;
    }
}
