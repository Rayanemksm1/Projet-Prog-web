<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'medecin') {
    header("Location: connexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Tableau de bord médecin</title><link rel="stylesheet" href="css/style.css"></head>
<body><div class="container">
<h2>Bienvenue, <?= $_SESSION['nom'] ?> (médecin)</h2>
<p><a href="logout.php">Se déconnecter</a></p>
</div></body></html>
