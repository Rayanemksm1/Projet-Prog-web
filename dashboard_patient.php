<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'patient') {
    header("Location: connexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Tableau de bord Patient</title><link rel="stylesheet" href="css/style.css"></head>
<body>
<div class="container">
<h2>Bienvenue, <?php echo $_SESSION['nom']; ?> (Patient)</h2>
<p>Réservez vos rendez-vous ici.</p>
<a href="logout.php">Se déconnecter</a>
</div></body></html>