<?php
session_start();
require 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($mdp, $user['mot_de_passe'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['role'] = $user['role'];
        header("Location: dashboard_" . $user['role'] . ".php");
        exit();
    } else {
        $error = "Identifiants incorrects";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Connexion</title><link rel="stylesheet" href="style.css"></head>
<body><div class="container">
<h2>Connexion</h2>
<form method="post">
    Email: <input type="email" name="email" required><br>
    Mot de passe: <input type="password" name="mdp" required><br>
    <button type="submit">Se connecter</button>
</form>
<?php if (isset($error)) echo "<p>$error</p>"; ?>
</div></body></html>
