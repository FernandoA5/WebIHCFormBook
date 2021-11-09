<?php
class Formula
{
    private $id;
    private $nombre;
    private $subtema;
    private $tema;
    private $tags;
    private $descripcion;

    public function __construct($id, $nombre, $subtema, $tema, $tags, $descripcion)
    {
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> subtema = $subtema;
        $this -> tema = $tema;
        $this -> tags = $tags;
        $this -> descripcion = $descripcion;
    }
    public function obtenerId()
    {
        return $this -> id;
    }
    public function obtenerNombre()
    {
        return $this -> nombre;
    }
    public function obtenerSubtema(){
        return $this -> subtema;
    }
    public function obtenerTema(){
        return $this -> tema;
    }
    public function obtenerTags(){
        return $this -> tags;
    }
    public function obtenerDescripcion()
    {
        return $this -> descripcion;
    }
}
?>