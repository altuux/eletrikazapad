<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// --- LOGIKA PRO NOVINKY ---

// 1. Přidání nové novinky
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_news'])) {
    $text = trim($_POST['news_text']);
    if (!empty($text)) {
        // Vložíme jako neaktivní
        $stmt = $conn->prepare("INSERT INTO novinky (text_zpravy, aktivni) VALUES (?, 0)");
        $stmt->bind_param("s", $text);
        $stmt->execute();
        $stmt->close();
        header("Location: " . $_SERVER['PHP_SELF'] . "?success=news_added");
        exit();
    }
}

// 2. Akce s novinkami (Aktivovat, Deaktivovat, Smazat)
if (isset($_GET['news_action']) && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    if ($_GET['news_action'] == 'activate') {
        // Deaktivovat vše
        $conn->query("UPDATE novinky SET aktivni = 0");
        // Aktivovat vybranou
        $stmt = $conn->prepare("UPDATE novinky SET aktivni = 1 WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif ($_GET['news_action'] == 'deactivate') {
        $stmt = $conn->prepare("UPDATE novinky SET aktivni = 0 WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif ($_GET['news_action'] == 'delete') {
        $stmt = $conn->prepare("DELETE FROM novinky WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

// Načtení novinek
$sql_news = "SELECT * FROM novinky ORDER BY id DESC";
$result_news = $conn->query($sql_news);

// --- LOGIKA PRO GALERII ---

// Načti fotky z databáze
$sql_gallery = "SELECT * FROM gallery ORDER BY datum DESC";
$result_gallery = $conn->query($sql_gallery);

// Dnešní datum
$today = date("d.m.Y");
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Administrace | Panel</title>
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

        <section class="dashboard-box">
            <h2>Správa novinek</h2>
            
            <form action="" method="post" class="uploadForm" style="margin-bottom: 30px;">
                <label for="news_text">Text nové zprávy:</label>
                <textarea name="news_text" id="news_text" placeholder="Sem napište text pro běžící lištu..." required></textarea>
                <button type="submit" name="add_news">Uložit novinku</button>
            </form>

            <div class="news-list">
                <h3>Seznam zpráv</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Text</th>
                            <th style="width: 120px;">Stav</th>
                            <th style="width: 200px;">Akce</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result_news && $result_news->num_rows > 0): ?>
                            <?php while ($row = $result_news->fetch_assoc()): ?>
                                <tr class="<?php echo ($row['aktivni'] == 1) ? 'row-active' : ''; ?>">
                                    <td><?php echo htmlspecialchars($row['text_zpravy']); ?></td>
                                    <td>
                                        <?php if ($row['aktivni'] == 1): ?>
                                            <span class="status-badge active">● Zobrazuje se</span>
                                        <?php else: ?>
                                            <span class="status-badge inactive">○ Skryto</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="actions-cell">
                                        <?php if ($row['aktivni'] == 0): ?>
                                            <a href="?news_action=activate&id=<?php echo $row['id']; ?>" class="btn-mini btn-green">Zobrazit</a>
                                        <?php else: ?>
                                            <a href="?news_action=deactivate&id=<?php echo $row['id']; ?>" class="btn-mini btn-yellow">Vypnout</a>
                                        <?php endif; ?>
                                        <a href="?news_action=delete&id=<?php echo $row['id']; ?>" class="btn-mini btn-red" onclick="return confirm('Smazat tuto zprávu?')">Smazat</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="3">Zatím žádné novinky.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>


        <section class="dashboard-box">
            <h2>Přidat novou fotografii</h2>

            <?php if (isset($_GET['success']) && $_GET['success'] != 'news_added'): ?>
                <p style="color:green;">Fotografie nahrána!</p>
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

        <section class="dashboard-box gallery-box">
            <h2>Galerie</h2>

            <div class="galleryGrid">
                <?php if ($result_gallery && $result_gallery->num_rows > 0): ?>
                    <?php while ($row = $result_gallery->fetch_assoc()): ?>
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