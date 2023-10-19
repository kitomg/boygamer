<?php

class Videojuegos
{

    protected $CODIGO;
    protected $NOMBRE;
    protected $FECHA_LANZAMIENTO;
    protected $COMPANIA;
    protected $PLATAFORMA;
    protected $GENERO;
    protected $LINK;

    public function __construct($CODIGO, $NOMBRE, $FECHA_LANZAMIENTO, $COMPANIA, $PLATAFORMA, $GENERO, $LINK)
    {
        
        $this->codigo = $CODIGO;
        $this->nombre = $NOMBRE;
        $this->fecha_lanzamiento=$FECHA_LANZAMIENTO;
        $this->compania = $COMPANIA;
        $this->plataforma = $PLATAFORMA;
        $this->genero = $GENERO;
        $this->link = $LINK;
    }

    public function getCODIGO()
    {
        return $this->codigo;
    }

    public function getNOMBRE()
    {
        return $this->nombre;
    }
    public function getFECHA_LANZAMIENTO()
    {
        return $this->fecha_lanzamiento;
    }
    public function getCOMPANIA()
    {
        return $this->compania;
    }


 public function getPLATAFORMA()
    {
        return $this->plataforma;
    }


 public function getGENERO()
    {
        return $this->genero;
    }
    public function getLINK()
    {
        return $this->link;
    }
}
