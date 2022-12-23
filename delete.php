<?php

require './functions.php';
$connection = connectionDb();
$DB_SCHEMA = $_ENV['DB_SCHEMA'];

if(!$connection) {
	echo 'Ha ocurrido un error con la conexión a base de datos.';
	die();
}

if(!isset($_GET['id'])) {
	header('Location: ./');
} else {
	$idUser = $_GET['id'];
	$statement = $connection->prepare("DELETE FROM $DB_SCHEMA.user WHERE id = '$idUser';");
	$statement->execute();
	header('Location: ./');
}

?>
