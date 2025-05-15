<?php
session_start();
require 'config.php';
$erreur = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        $erreur = "Cet email est déjà utilisé.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, email, mot_de_passe, role) VALUES (?, ?, ?, 'patient')");
        $stmt->execute([$nom, $email, $mot_de_passe]);

        $_SESSION['id'] = $pdo->lastInsertId();
        $_SESSION['nom'] = $nom;
        $_SESSION['role'] = 'patient';
        header("Location: dashboard_patient.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Inscription</title><link rel="stylesheet" href="css/style.css"></head>
<body><div class="container">
<h2>Inscription Patient</h2>
<form method="post">
    <label>Nom</label><input type="text" name="nom" required>
    <label>Email</label><input type="email" name="email" required>
    <label>Mot de passe</label><input type="password" name="mot_de_passe" required>
    <button type="submit">S'inscrire</button>
    <?php if ($erreur) echo "<p style='color:red;'>$erreur</p>"; ?>
</form>
<p>Déjà inscrit ? <a href="connexion.php">Connectez-vous</a></p>
</div></body></html>