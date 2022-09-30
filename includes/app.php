<?php 

require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);//llamamos al archivo .env que esta en la misma carpeta (como segundo parametro se le podria pasar el nombre del archivo si fuese distinto a .env)
$dotenv->safeLoad(); //si el archivo no existe, no va a marcar error

require 'funciones.php';
require 'database.php';

// Conectarnos a la base de datos
use Model\ActiveRecord;
ActiveRecord::setDB($db);