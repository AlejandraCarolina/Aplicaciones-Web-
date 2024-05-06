
<div>
<h2>Iniciar Sesión</h2>
<form action="./index.php?controller=UserController&action=inicioSesion" method="post">
    <label for="user">Usuario:</label>
    <input type="text" name="user" id="user"><br>
    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" id="contrasena"><br>
    <input type="submit" value="Iniciar Sesión">
</form>
<a href="./index.php?controller=UserController&action=registrar">Registrar</a>
</div>
   