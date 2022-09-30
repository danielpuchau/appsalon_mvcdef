<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta </p>

<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>



<form action="/crear-cuenta" method="POST" class="formulario">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input 
            type="nombre"
            id="nombre"
            placeholder="tu nombre"
            name="nombre" 
            value="<?php echo s($usuario->nombre); ?>"       
        />
    </div>
    <div class="campo">
        <label for="apellido">Apellido</label>
        <input 
            type="apellido"
            id="apellido"
            placeholder="tu apellido"
            name="apellido" 
            value="<?php echo s($usuario->apellido); ?>"         
        />
    </div>
    <div class="campo">
        <label for="telefono">Telefono</label>
        <input 
            type="telefono"
            id="telefono"
            placeholder="tu telefono"
            name="telefono"  
            value="<?php echo s($usuario->telefono); ?>"         
        />
    </div>
    <div class="campo">
        <label for="password">E-mail</label>
        <input 
            type="email"
            id="email"
            placeholder="tu E-mail"
            name="email" 
            value="<?php echo s($usuario->email); ?>"           
        />
    </div>
    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password"
            id="password"
            placeholder="tu Password"
            name="password" 
            value="<?php echo s($usuario->password); ?>"           
        />
    </div>
    <input type="submit" value="crear cuenta" class="boton">


</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/olvide">¿Olvidaste la contraseña?</a>
</div>