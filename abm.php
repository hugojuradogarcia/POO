<?php 
	
	require('usuarios_model.php');

	# Traer los datos de un usuario
	$usuario1 = new Usuario();
	$usuario1->get($_POST['email']);
	echo $usuario1->nombre . ' ' . $usuario1->apellido . ' existe<br>';
?>
