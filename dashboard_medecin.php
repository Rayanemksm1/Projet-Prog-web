<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'medecin') {
    header("Location: connexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Tableau de bord Médecin</title><link rel="stylesheet" href="css/style.css"></head>
<body>
<div class="container">
<h2>Bienvenue, Dr. <?php echo $_SESSION['nom']; ?> (Médecin)</h2>
<p>Consultez vos rendez-vous ici.</p>
<a href="logout.php">Se déconnecter</a>
</div></body></html>