<?php

require './functions.php';
$connection = connectionDb();
$DB_SCHEMA = $_ENV['DB_SCHEMA'];

if(!$connection) {
	echo 'Ha ocurrido un error con la conexión a base de datos.';
	die();
}

$users = $connection->prepare("SELECT * FROM $DB_SCHEMA.user;");
$users->execute();
$users = $users -> fetchAll();

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
			<?php foreach($users as $user): ?>
			<tr class="table-users__tbody">
					<td><?php echo $user['id'] ?></td>
					<td><?php echo $user['name'] ?></td>
					<td><?php echo $user['lastname'] ?></td>
					<td><?php echo $user['phone'] ?></td>
					<td><?php echo $user['email'] ?></td>
					<td class="table-users__actions">
						<a class="btn-action --blue" href="./form.php?id=<?php echo $user['id'] ?>"><i class="bi bi-pencil-fill"></i></a>
						<a class="btn-action --red" href="./delete.php?id=<?php echo $user['id'] ?>"><i class="bi bi-trash3-fill"></i></a>
					</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</section>
</body>
</html>
