<?php
require 'controllers/indexCtrl.php';
$title = "Connextion";
$link = '<link rel="stylesheet" href="assets/css/index.css">';
require 'ui/head.php';
?>

<body>
	<h1>Création</h1>
	<form>
		<label for="firstname">Prénom</label>
		<input id="firstname" type="text" name="firstname" placeholder="Prénom" required>
		<label for="lastname">Nom</label>
		<input id="lastname" type="text" name="lastname" placeholder="Nom" required>
		<label for="email">Email</label>
		<input id="email" type="email" name="email" placeholder="Email" required>
		<label for="password">Mot de passe</label>
		<input id="password" type="password" name="password" placeholder="Mot de passe" required>
		<label for="password">Confirmation du mot de passe</label>
		<input id="confirmPassword" type="password" name="confirmPassword" placeholder="Mot de passe" required>
		<button type="submit">Créer un compte</button>
	</form>

	<h1>Connexion</h1>
	<form>
		<label for="email">Email</label>
		<input id="email" type="email" name="login_email" placeholder="Email" required>
		<label for="password">Mot de passe</label>
		<input id="password" type="password" name="login_password" placeholder="Mot de passe" required>
		<button type="submit">Créer un compte</button>
	</form>
</body>

</html>