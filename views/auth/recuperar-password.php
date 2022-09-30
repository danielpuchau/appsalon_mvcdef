<h1 class="nombre-pagina">Recuperar Contraseña</h1>
<p class="descripcion-pagina">Escriba su nueva contraseña a continuacion</p>

<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

<?php if($error) return; ?>

<form  class="formulario" method="POST">
    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password"
            id="password"
            placeholder="tu nuevo password"
            name="password"        
        />
    </div>
    <input type="submit" class="boton" value="Guardar Nuevo Password">
</form> 
<div class="acciones">
    <a href="/">Iniciar sesion</a>
    <a href="/crear-cuenta">¿Aun no tienes una cuenta?</a>
</div>
