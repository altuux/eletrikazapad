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
    <link rel="stylesheet" href="dashboardStyle.css" class="css">
</head>
<body>
    <nav class="navbarDashboard">
        <ul>
            <li><h1>Vítej, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1></li>
            <li><p>Tady bude obsah administrace.</p></li>
            <li><a href="logout.php">Odhlásit se</a></li>
        </ul>

    </nav>
</body>
</html>
