<?php
$mysqli = new mysqli("localhost", "id20579279_erpusrname2", "w@M5?d6OoOX{Iy5E", "id20579279_erp2");
if ($mysqli->connect_error) die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
session_start();

require_once("fonction.php");
