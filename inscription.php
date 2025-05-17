<?php
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nom, $email, $mdp, $role]);
    header("Location: connexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Inscription</title><link rel="stylesheet" href="css/style.css"></head>
<body><div class="container">
<h2>Inscription</h2>
<form method="post">
    Nom: <input type="text" name="nom" required><br>
    Email: <input type="email" name="email" required><br>
    Mot de passe: <input type="password" name="mdp" required><br>
    Rôle: <select name="role"><option value="patient">Patient</option><option value="medecin">Médecin</option></select><br>
    <button type="submit">S'inscrire</button>
</form>
</div></body></html>
