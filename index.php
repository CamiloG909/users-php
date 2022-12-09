<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$DB_HOST = $_ENV['DB_HOST'];
$DB_USER = $_ENV['DB_USER'];
$DB_PASS = $_ENV['DB_PASS'];
$DB_NAME = $_ENV['DB_NAME'];
$DB_SCHEMA = $_ENV['DB_SCHEMA'];
$DB_PORT = $_ENV['DB_PORT'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#1CCC5B" />
	<link rel="stylesheet" href="./styles/styles.css">
	<link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
	<title>Home</title>
</head>
<body>
	<?php require('./components/header.php') ?>
	<section class="container" style="text-align: right;">
		<a class="add-user-link" href="./form.php">New user <i class="bi bi-hand-index-thumb-fill"></i></a>
		<table class="table-users">
			<tr class="table-users__thead">
				<th>#</th>
				<th>NAME</th>
				<th>LAST NAME</th>
				<th>PHONE</th>
				<th>EMAIL</th>
			</tr>
			<tr class="table-users__tbody">
					<td>adsa</td>
					<td>das</td>
					<td>dasd</td>
					<td>dasd</td>
					<td>dasdasda</td>
					<td class="table-users__actions">
						<a class="btn-action --blue" href="./form.php?id=222"><i class="bi bi-pencil-fill"></i></a>
						<a class="btn-action --red" href="#"><i class="bi bi-trash3-fill"></i></a>
					</td>
			</tr>
		</table>
	</section>
	<div class="message">Notification</div>
</body>
</html>
