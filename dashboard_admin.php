<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    header("Location: connexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Tableau de bord admin</title><link rel="stylesheet" href="style.css"></head>
<body><div class="container">
<h2>Bienvenue, <?= $_SESSION['nom'] ?> (admin)</h2>
<p><a href="admin_gestion.php">Gérer les utilisateurs</a></p>
<p><a href="logout.php">Se déconnecter</a></p>
</div></body></html>
