<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'patient') {
    header("Location: connexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Tableau de bord patient</title><link rel="stylesheet" href="css/style.css"></head>
<body><div class="container">
<h2>Bienvenue, <?= $_SESSION['nom'] ?> (patient)</h2>
<p><a href="reserver.php">Prendre un rendez-vous</a></p>
<p><a href="mes_rendezvous.php">Mes rendez-vous</a></p>
<p><a href="logout.php">Se déconnecter</a></p>
</div></body></html>
