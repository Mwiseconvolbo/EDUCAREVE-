<?php
session_start();
include('config.php'); // Fichier contenant les informations de connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Requête pour vérifier les informations de connexion
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirection en fonction du rôle
        if ($user['role'] == 'teacher') {
            header("Location: teacher_dashboard.html");
        } elseif ($user['role'] == 'assistant') {
            header("Location: assistant_dashboard.html");
        } else {
            header("Location: student_dashboard.html");
        }
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>
