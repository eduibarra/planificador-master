<?php
	$titulo = "Panel de Alta de un nuevo Usuario";

require 'Class/Conexion.php';
require 'Class/Usuario.php';

$usuario = new Usuario();
$mensaje = $usuario->altaUsuario();

include "plantillas/cabecera.php"

?>

<div class="container">
	<div>

		<h2><?php echo $mensaje; ?></h2>

		<a href="form_login.php">
			<input type="submit" class="btn btn-primary" value="Iniciar sesion">
		</a>
	</div>
</div>

	<div id="pie">
		<?php  include "plantillas/pie.php"  ?>
	</div>
	
</body>
</html>