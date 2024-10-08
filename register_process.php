<?php
include('config.php'); // Fichier contenant les informations de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Requête pour insérer les nouvelles informations d'utilisateur
    $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
    if (mysqli_query($conn, $query)) {
        echo "Inscription réussie. <a href='login.html'>Connectez-vous ici</a>.";
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>
