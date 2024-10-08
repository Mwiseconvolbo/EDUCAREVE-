<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "plateforme_educative";

// Créer la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}
?>
