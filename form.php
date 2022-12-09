<?php

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
	<form class="box form">
		<p class="form__title"><?php if($edit) { echo 'Edit'; } else {echo 'Add'; } ?> user <?php if($edit) { echo '<i class="bi bi-pencil-fill"></i>'; } else {echo '<i class="bi bi-person-fill"></i>'; } ?></p>
		<input class="form__i-text" type="text" name="name" placeholder="Name">
		<input class="form__i-text" type="text" name="lastname" placeholder="Last name">
		<input class="form__i-text" type="number" name="phone" placeholder="Phone number">
		<input class="form__i-text" type="email" name="email" placeholder="Email">
		<button class="form__btn-add">Save <?php if($edit) { echo '<i class="bi bi-cloud-arrow-up-fill"></i>'; } else {echo '<i class="bi bi-cloud-plus-fill"></i>'; } ?></button>
	</form>
</body>
</html>
