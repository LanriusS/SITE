<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="author" content="Lucas Schiavetti" />
<title>R409</title>
<link href="assets/favicon.ico" rel="icon" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<script defer="defer" src="js/index.js"></script>
</head>
<body>

	<h1 id="title">PROJET 4E</h1>


	<h2 class="titre">Groupe 1C</h2>


	<div class="co">
		<p class="connection">Connexion</p>

		<div>
			<label for="id">Identifiant :</label>
			<input type="text" id="id" name="id">
		</div>

		<div>
			<label for="pass">Mot de passe</label>
			<input type="password" id="pass" name="password" minlength="5" required>
		</div>

		<input type="submit" value="Se connecter" id="envoie">
	</div>

<?php
require_once("footer.php");
?>
