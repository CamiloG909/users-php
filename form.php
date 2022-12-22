<?php

require './functions.php';
$connection = connectionDb();
$DB_SCHEMA = $_ENV['DB_SCHEMA'];

if(!$connection) {
	echo 'Ha ocurrido un error con la conexión a base de datos.';
	die();
}

$edit;

if(!isset($_GET['id'])) {
	if(count($_GET) > 0) {
		header('Location: ./form.php');
	}

	$edit = false;
} else {
	$idUser = $_GET['id'];

	$edit = true;
}

$notification = false;

if(isset($_POST['add-user'])) {
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_EMAIL);
	$lastname =  filter_var(trim($_POST['lastname']), FILTER_SANITIZE_EMAIL);
	$phone =  filter_var(trim($_POST['phone']), FILTER_SANITIZE_EMAIL);
	$email =  filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

	if($name == '' || $lastname == '' || $phone == '' || $email == '') {
		$notification = true;
	} else {
		$statement = $connection->prepare("INSERT INTO $DB_SCHEMA.user(name,lastname,phone,email) VALUES ('$name', '$lastname', '$phone', '$email');");
		$statement->execute();
		header('Location: ./');
	}
}

if(isset($_POST['edit-user'])) {
	echo "se edito";
}

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
	<title><?php if($edit) { echo 'Edit'; } else {echo 'Add'; } ?> user</title>
</head>
<body>
	<?php require('./components/header.php') ?>
	<form class="box form" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<p class="form__title"><?php if($edit) { echo 'Edit'; } else {echo 'Add'; } ?> user <?php if($edit) { echo '<i class="bi bi-pencil-fill"></i>'; } else {echo '<i class="bi bi-person-fill"></i>'; } ?></p>
		<input class="form__i-text" type="text" name="name" placeholder="Name">
		<input class="form__i-text" type="text" name="lastname" placeholder="Last name">
		<input class="form__i-text" type="number" name="phone" placeholder="Phone number">
		<input class="form__i-text" type="email" name="email" placeholder="Email">
		<button class="form__btn-add" name="<?php if($edit) { echo 'edit-user'; } else {echo 'add-user'; } ?>" >Save <?php if($edit) { echo '<i class="bi bi-cloud-arrow-up-fill"></i>'; } else {echo '<i class="bi bi-cloud-plus-fill"></i>'; } ?></button>
	</form>
	<?php if($notification): ?>
	<div class="message"><i class="bi bi-x-circle-fill"></i> Please fill all the fields</div>
	<?php endif; ?>
</body>
</html>
