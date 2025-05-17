<?php
session_start();
require 'config.php';
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'patient') {
    header("Location: connexion.php");
    exit();
}
$stmt = $pdo->prepare("SELECT * FROM rendezvous WHERE patient_id = ?");
$stmt->execute([$_SESSION['id']]);
$rdvs = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head><title>Mes rendez-vous</title><link rel="stylesheet" href="css/style.css"></head>
<body><div class="container">
<h2>Mes rendez-vous</h2>
<ul>
<?php foreach ($rdvs as $rdv): ?>
    <li><?= $rdv['date_rdv'] ?> à <?= $rdv['heure_rdv'] ?></li>
<?php endforeach; ?>
</ul>
<p><a href="dashboard_patient.php">Retour</a></p>
</div></body></html>
