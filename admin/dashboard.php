<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Načti fotky z databáze
$sql = "SELECT * FROM gallery ORDER BY datum DESC";
$result = $conn->query($sql);

// Dnešní datum
$today = date("d.m.Y");
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Administrace | Galerie</title>
    <link rel="stylesheet" href="dashboardStyle.css">
</head>
<body>
    <nav class="navbarDashboard">
        <ul>
            <li><h1>Vítej, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1></li>
            <li><p class="date"><?php echo $today; ?></p></li>
            <li><a href="logout.php" class="logout-btn">Odhlásit se</a></li>
        </ul>
    </nav>

    <main class="dashboardContainer">

        <!-- Formulář pro přidání nové fotky -->
        <section class="dashboard-box">
            <h2>Přidat novou fotografii</h2>

            <?php if (isset($_GET['success'])): ?>
                <p style="color:green;">Hotovo!</p>
            <?php elseif (isset($_GET['error'])): ?>
                <p style="color:red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>

            <form action="photo_add.php" method="post" enctype="multipart/form-data" class="uploadForm">
                <label for="photoTitle">Název fotografie:</label>
                <input type="text" name="photoTitle" id="photoTitle" placeholder="Např. Montáž FVE Plzeň" required>

                <label for="photoFile">Vyber obrázek:</label>
                <input type="file" name="photoFile" id="photoFile" accept="image/*" required>

                <button type="submit">Nahrát fotografii</button>
            </form>
        </section>

        <!-- Galerie -->
        <section class="dashboard-box gallery-box">
            <h2>Galerie</h2>

            <div class="galleryGrid">
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="galleryItem">
                            <img src="../uploads/<?php echo htmlspecialchars($row['obrazek']); ?>" alt="<?php echo htmlspecialchars($row['nazev']); ?>">
                            <p><?php echo htmlspecialchars($row['nazev']); ?></p>
                            <span class="dateSmall"><?php echo date("d.m.Y H:i", strtotime($row['datum'])); ?></span>
                            <div class="galleryActions">
                                <a href="photo_edit.php?id=<?php echo $row['id']; ?>" class="editBtn">Upravit</a>
                                <a href="photo_delete.php?id=<?php echo $row['id']; ?>" class="deleteBtn" onclick="return confirm('Opravdu smazat tuto fotografii?')">Smazat</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Zatím nejsou nahrány žádné fotografie.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
</body>
</html>
