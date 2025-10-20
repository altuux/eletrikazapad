<?php
// login.php

session_start();
require_once 'config.php';

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

// Zpracování formuláře
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $admin_username = 'Fasi';
    $admin_password = 'Kouše';

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
    <link rel="stylesheet" href="loginStyle.css" class="css">
</head>
<body>
    <div class="loginContainer">
        <h2>Přihlášení do administrace</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="uživatel" required><br><br>
            <input type="password" name="password" placeholder="heslo" required><br><br>
            <button type="submit">Přihlásit se</button>
        </form>
    </div>
</body>
</html>
