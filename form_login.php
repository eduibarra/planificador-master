<?php
	$titulo = "Login";
	include "plantillas/cabecera.php";
?>
</head>
<body>
<div class="container">
	<h1><?php echo $titulo ; ?></h1>

	<!-- inicio del desarrollo -->
	<div class="centrado">
		<div class="form-group">
			<form action="login.php" method="post" class="form-inline" role="form">
				<div  class="form-group">
					<label for="usuario">Usuario</label>
					<input type="text" class="form-control" name="usr_email" placeholder="ingrese su usuario" required="">
				</div>

				<div class="form-group">
					<label for="clave">Clave</label>
					<input type="password" class="form-control" name="usr_pass" placeholder="ingrese contraseña" required="">
				</div>
				<input type="submit" value="Ingresar" class="btn btn-primary"/>

			</form>
			<a class="btn btn-link" href="form_alta_usuario.php">registrarse</a>
		</div>
	</div>
</div>


	<?php 
		if (isset($_GET['error'])){
			$error = $_GET['error'];
			if ($error == 1) {
	?>
	<span class="help-block-error">
		Usuario y/o clave incorrectos
	</span>
	<?php 
			}
		}
	?>
	
	<div id="pie">
		<?php  include "plantillas/pie.php"  ?>
	</div>
	
</body>
</html>