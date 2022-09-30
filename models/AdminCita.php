<?php 

namespace Model;

//este modelo, a diferencia de los otros, no se basa en una tabla, si no en una mezcla de varias
class AdminCita extends ActiveRecord {
    protected static $tabla = 'citasservicios'; //esta es la tabla de la que recoge más info
    protected static $columnasDB = ['id', 'hora', 'cliente', 'email', 'telefono', 'servicio', 'precio']; //estas son las columnas de la consulta que combina varias tablas, no de una tabla en particular


    //creamos los atributos igualmente
    public $id;
    public $hora;
    public $cliente;
    public $email;
    public $telefono;
    public $servicio;
    public $precio;


    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->hora = $args['hora'] ?? '';
        $this->cliente = $args['cliente'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->servicio = $args['servicio'] ?? '';
        $this->precio = $args['precio'] ?? '';
    }    
}