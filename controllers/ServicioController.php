<?php

namespace Controllers;
use Model\Servicio;

use MVC\Router;

class ServicioController {

    public static function index( Router $router) {
        session_Start();

        isAdmin();

        $servicios = Servicio::all();

        $router->render('servicios/index', [
            'nombre' => $_SESSION['nombre'],
            'servicios' => $servicios
        ]);
    }


    public static function crear( Router $router) {
        session_Start();

        isAdmin();

        $servicio = new Servicio;
        $alertas = []; 

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $servicio->sincronizar($_POST);//este metodo sincronizaba los datos del post con el objeto ya creado(no crea un nuevo objeto)

            $alertas = $servicio->validar();

            if(empty($alertas)){
                $servicio->guardar();
                header('Location: /servicios');
            }
        } 

        $router->render('servicios/crear', [
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }
     

    public static function actualizar( Router $router) {
        session_Start();

        isAdmin();

        
        if(!is_numeric($_GET['id'])) return; //para la funcion is_numeric, la nada se considera tb no numeric
        $servicio = Servicio::find($_GET['id']);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $servicio->sincronizar($_POST);

            $alertas = $servicio->validar();

            if(empty($alertas)){
                $servicio->guardar();
                header('Location: /servicios');
            }

        }

        $router->render('servicios/actualizar', [
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }
     

    public static function eliminar() {
        session_Start();
        isAdmin();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){   
            
            $id = $_POST['id'];
            $servicio = Servicio::find($id);
            $servicio->eliminar();
            header('Location: /servicios');

        }
    }
     
     
}