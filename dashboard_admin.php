<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    header("Location: connexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Tableau de bord Admin</title><link rel="stylesheet" href="css/style.css"></head>
<body>
<div class="container">
<h2>Bienvenue, <?php echo $_SESSION['nom']; ?> (Admin)</h2>
<p>Gérez les utilisateurs et rendez-vous.</p>
<a href="logout.php">Se déconnecter</a>
</div></body></html>