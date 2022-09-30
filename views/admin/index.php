<h1 class="nombre-pagina">Panel de Administracion</h1>

<?php 
    include_once __DIR__ . "/../templates/barra.php";
?>

<h2>Buscar Citas</h2>
<div class="busqueda">
    <form action="" class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input 
                type="date"
                id="fecha"
                name="fecha"
                value="<?php echo $fecha; ?>"              
            />
        </div>
    </form>
</div>

<?php
    if(count($citas) === 0){
        echo "<h2>No hay citas en esta fecha </h2>";    
    }
?>

<div id="citas-admin">
    <ul class="citas">
        <?php
       // debuguear($citas);
            $idCita = 0;
            foreach( $citas as $key =>$cita ) {
                
                if($idCita !== $cita->id) {
                    $total = 0; 
        ?>     
            <li>
                <p>ID: <span><?php echo $cita->id; ?></span></p>
                <p>Hora: <span><?php echo $cita->hora; ?></span></p>
                <p>Cliente: <span><?php echo $cita->cliente; ?></span></p>
                <p>Email: <span><?php echo $cita->email; ?></span></p>

                <h3>Servicios Contratados</h3>
                <?php
                $idCita = $cita->id;  
                }//fin del if  

                $total += $cita->precio;

                ?>
                <p class="servicio"><?php echo $cita->servicio . " " . $cita->precio ?></p>

                <?php
                    $actual = $cita->id;//nos devuelve el id en el que nos encontramos
                    $proximo = $citas[$key + 1]->id ?? 0; //indice en el arreglod e la bade de datos: 0,1,2...

                   if(esUltimo($actual, $proximo)) { ?>

                   <p class="total">Total: <span> $ <?php echo $total; ?></p>

                   <form action="/api/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cita->id; ?>">

                        <input type="submit" value="Eliminar" class="boton-eliminar">
                   </form>
                        
                <?php }//fin del if  ?>

            <?php }//fin del foreach  ?>       
    </ul>
</div>
<?php
    $script = "<script src='build/js/buscador.js'></script>";
?>
