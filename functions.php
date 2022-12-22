<?php

function connectionDb() {

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$DB_HOST = $_ENV['DB_HOST'];
$DB_USER = $_ENV['DB_USER'];
$DB_PASS = $_ENV['DB_PASS'];
$DB_NAME = $_ENV['DB_NAME'];
$DB_SCHEMA = $_ENV['DB_SCHEMA'];
$DB_PORT = $_ENV['DB_PORT'];

try {
	$connection= new PDO("pgsql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME",$DB_USER,$DB_PASS);
	return $connection;
} catch (PDOException $e) {
	return false;
}

}

?>
