<?php
	$titulo = "Panel de Alta de Usuarios";
	include "plantillas/cabecera.php";
?>

</head>
<body>

	<div class="container">
		<div class="form-group">
			<form action="alta_usuario.php" method="post" role="form">
				<div class="col-xs-5">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" name="usr_nombre" placeholder="Ingrese su nombre" required="">
					</div>
					<div class="form-group">
						<label for="nombre">Apellido</label>
						<input type="text" class="form-control" name="usr_apellido" placeholder="Ingrese su apellido" required="">
					</div>
					<div class="form-group">
						<label for="nombre">E-mail</label>
						<input type="email" class="form-control" name="usr_email" placeholder="Ingrese su e-mail" required="">
					</div>
					<div class="form-group">
						<label for="nombre">Contraseña</label>
						<input type="password" class="form-control" name="usr_pass" placeholder="Ingrese su contraseña" required="">
					</div>
					<input type="hidden" name="usr_id">
					<input type="submit" class="btn btn-primary" value="Registrar">
				</div>
			</form>
		</div>
	</div>
	<div id="pie">
		<?php  include "plantillas/pie.php";  ?>
	</div>

</body>
</html>