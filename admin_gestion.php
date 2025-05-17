<?php
session_start();
require 'config.php';
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    header("Location: connexion.php");
    exit();
}
$stmt = $pdo->query("SELECT * FROM utilisateurs");
$users = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head><title>Gestion des utilisateurs</title><link rel="stylesheet" href="style.css"></head>
<body><div class="container">
<h2>Utilisateurs enregistrés</h2>
<table border="1">
<tr><th>ID</th><th>Nom</th><th>Email</th><th>Rôle</th></tr>
<?php foreach ($users as $u): ?>
<tr>
<td><?= $u['id'] ?></td><td><?= $u['nom'] ?></td><td><?= $u['email'] ?></td><td><?= $u['role'] ?></td>
</tr>
<?php endforeach; ?>
</table>
<p><a href="dashboard_admin.php">Retour</a></p>
</div></body></html>
