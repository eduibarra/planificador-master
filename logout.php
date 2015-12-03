<?php
	$titulo = "Salir del sistema";
	session_start();
	$usuario_nombre = $_SESSION['usuario_nombre'];
	header("refresh:2;url=form_login.php");
?>
<?php include "plantillas/cabecera.php"; ?>
</head>
<body>
	<div id="main">
		<h1><?php echo $titulo ; ?></h1>
		<!-- inicio del desarrollo -->
		<span class="help-block-error">Gracias por su visita... <?php echo $usuario_nombre; ?>"</span>
	</div>
<?php 
    session_unset();
	session_destroy();
?>
	<div id="pie">
		<?php  include "plantillas/pie.php"  ?>
	</div>
	
</body>
</html>