<?php
    $usr_email = $_POST['usr_email'];
	$usr_pass = $_POST['usr_pass'];
	//$usu_nombre = $_POST['usu_nombre'];
	require 'conexion.php';
	
	$sql = "SELECT usr_id, usr_nombre, usr_apellido FROM usuarios
			WHERE usr_email='".$usr_email."'
			AND usr_pass = '".$usr_pass."'";
	$resultado = mysqli_query($link, $sql);
	$cantidad = mysqli_num_rows($resultado); // ----> Cuenta los registros

	if ($cantidad == 0) {
		header("location:form_login.php?error=1"); // ----> envia el dato de error
	} else {
		// -----> Rutina de autenticacion
		session_start();
		$_SESSION['login']= "ok";
		$fila = mysqli_fetch_assoc($resultado);
		$_SESSION['usuario_nombre'] = $fila['usr_nombre'];
		$_SESSION['usuario_apellido'] = $fila['usr_apellido'];
		$_SESSION['usuario_id'] = $fila['usr_id'];
		// Rutina para ingresar a sistema
		header("location:index.php");
	}
	
