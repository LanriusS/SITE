<?php
ini_set();
//$mysqli = new mysqli("https://linserv-info-01.campus.unice.fr/phpmyadmin/", "sl027789", "", "sl027789_4E");

/*
if ($mysqli->connect_error) die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
*/

$conn = mysqli_connect("https://linserv-info-01.campus.unice.fr/phpmyadmin/", "sl027789", "19990223Lu", "sl027789_4E");

// Vérification de la connexion
/*if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}
echo "Connexion réussie !";*/

if (!$conn) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

session_start();

require_once("fonction.php");
?>