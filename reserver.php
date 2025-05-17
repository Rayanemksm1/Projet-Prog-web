<?php
session_start();
require 'config.php';
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'patient') {
    header("Location: connexion.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $stmt = $pdo->prepare("INSERT INTO rendezvous (patient_id, date_rdv, heure_rdv) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION['id'], $date, $heure]);
    header("Location: mes_rendezvous.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Prendre un rendez-vous</title><link rel="stylesheet" href="css/style.css"></head>
<body><div class="container">
<h2>Prendre un rendez-vous</h2>
<form method="post">
    Date: <input type="date" name="date" required><br>
    Heure: <input type="time" name="heure" required><br>
    <button type="submit">Réserver</button>
</form>
</div></body></html>
