<?php
// login.php

session_start();
require_once 'config.php';

// Pokud už je přihlášený, přesměruj na dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

// Zpracování formuláře
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Jediný povolený uživatel
    $admin_username = 'admin';
    $admin_password = 'admin123'; // Můžeš změnit, nebo později uložit hash do DB

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Neplatné přihlašovací údaje!";
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Přihlášení</title>
    <link rel="stylesheet" href="style-admin.css" class="css">
</head>
<body>
    <h2>Přihlášení do administrace</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label>Uživatel:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Heslo:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Přihlásit se</button>
    </form>
</body>
</html>
