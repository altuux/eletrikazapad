<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Vítej, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>Tady bude obsah administrace.</p>
    <a href="logout.php">Odhlásit se</a>
</body>
</html>
