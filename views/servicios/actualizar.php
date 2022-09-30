<h1 class="nombre-pagina">Actualizar Servicio</h1>
<p class="descripcion-pagina">Modifique los campos que desee actualizar</p>

<?php 
    include_once __DIR__ . '/../templates/barra.php';
    include_once __DIR__ . '/../templates/alertas.php';
?>

<form method="POST" class="formulario"> <!-- Para que no haya problemas con el id= de la url, eliminamos el actio="", -->
    <?php 
        include_once __DIR__ . '/formulario.php';
    ?>

    <input type="submit" class="boton" value="Actualizar Servicio"> 
</form>
