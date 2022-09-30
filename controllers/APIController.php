<?php

namespace Controllers;
use MVC\Router;
use Model\Servicio;
use Model\Cita;
use Model\CitaServicio;

class APIController {

    public static function index(){
        $servicios = Servicio::All();
        echo json_encode($servicios);
    }


    public static function guardar(){

        //almacena la cita y devuelve la conexion
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();

        $id = $resultado['id'];

        //almacena la cita y el servicio

        $idServicios = explode(",", $_POST['servicios']); // El explode separa los elementos del string de $POST mediante el caracter seleccionado ',' y cada separacion se convierte en un elemento de un arreglo u objeto

        foreach($idServicios as $idServicio) {
            $args = [
                'citaId' => $id,
                'servicioId' => $idServicio
            ];

            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();
        }

        //Retornamos una respuesta
        $respuesta = [
            'resultado' => $resultado
        ];

        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];

            $cita = Cita::find($id);
            $cita->elimar();
            header ('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}