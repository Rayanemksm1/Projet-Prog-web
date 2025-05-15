<?php
session_start();
require 'config.php';
$erreur = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ? AND mot_de_passe = ?");
    $stmt->execute([$email, $mot_de_passe]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['role'] = $user['role'];

        switch ($user['role']) {
            case 'admin': header("Location: dashboard_admin.php"); break;
            case 'medecin': header("Location: dashboard_medecin.php"); break;
            default: header("Location: dashboard_patient.php"); break;
        }
        exit();
    } else {
        $erreur = "Identifiants incorrects.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Connexion</title><link rel="stylesheet" href="css/style.css"></head>
<body><div class="container">
<h2>Connexion</h2>
<form method="post">
    <label>Email</label><input type="email" name="email" required>
    <label>Mot de passe</label><input type="password" name="mot_de_passe" required>
    <button type="submit">Se connecter</button>
    <?php if ($erreur) echo "<p style='color:red;'>$erreur</p>"; ?>
</form>
<p>Pas encore inscrit ? <a href="inscription.php">Inscrivez-vous</a></p>
</div></body></html>