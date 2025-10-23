<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Pokud nemáme ID, přesměruj zpět
if (!isset($_GET['id'])) {
    header("Location: dashboard.php?error=Neplatné ID fotografie.");
    exit();
}

$id = (int)$_GET['id'];

// Načtení dat o fotce
$stmt = $conn->prepare("SELECT * FROM gallery WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: dashboard.php?error=Fotografie nenalezena.");
    exit();
}

$photo = $result->fetch_assoc();

// Uložení změn
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newTitle = trim($_POST['photoTitle']);
    $newFile = $_FILES['photoFile'];
    $uploadDir = "../uploads/";
    $updateQuery = "UPDATE gallery SET nazev = ?" . ($newFile['error'] === UPLOAD_ERR_OK ? ", obrazek = ?" : "") . " WHERE id = ?";

    if ($newFile['error'] === UPLOAD_ERR_OK) {
        // Kontrola typu
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
        if (!in_array($newFile['type'], $allowedTypes)) {
            header("Location: photo_edit.php?id=$id&error=Povoleny jsou pouze obrázky (JPG, PNG, WEBP).");
            exit();
        }

        // Odstranění starého souboru
        $oldPath = $uploadDir . $photo['obrazek'];
        if (file_exists($oldPath)) {
            unlink($oldPath);
        }

        // Uložení nového souboru
        $newFileName = time() . "_" . preg_replace('/\s+/', '_', basename($newFile['name']));
        $newFilePath = $uploadDir . $newFileName;

        if (!move_uploaded_file($newFile['tmp_name'], $newFilePath)) {
            header("Location: photo_edit.php?id=$id&error=Chyba při ukládání souboru.");
            exit();
        }

        // Aktualizace v databázi (název + nový soubor)
        $stmtUpdate = $conn->prepare($updateQuery);
        $stmtUpdate->bind_param("ssi", $newTitle, $newFileName, $id);
    } else {
        // Jen změna názvu
        $stmtUpdate = $conn->prepare($updateQuery);
        $stmtUpdate->bind_param("si", $newTitle, $id);
    }

    $stmtUpdate->execute();
    $stmtUpdate->close();

    header("Location: dashboard.php?success=Změny byly uloženy.");
    exit();
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Upravit fotografii</title>
    <link rel="stylesheet" href="dashboardStyle.css">
</head>
<body>
    <div class="dashboard-box">
        <h2>✏️ Upravit fotografii</h2>

        <?php if (isset($_GET['error'])): ?>
            <p style="color:red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <label for="photoTitle">Název fotografie:</label>
            <input type="text" name="photoTitle" id="photoTitle" value="<?php echo htmlspecialchars($photo['nazev']); ?>" required>

            <p>Aktuální obrázek:</p>
            <img src="../uploads/<?php echo htmlspecialchars($photo['obrazek']); ?>" alt="náhled" class="editPreview">

            <label for="photoFile">Změnit obrázek (nepovinné):</label>
            <input type="file" name="photoFile" id="photoFile" accept="image/*">

            <button type="submit">💾 Uložit změny</button>
            <a href="dashboard.php" class="backBtn">⬅️ Zpět do administrace</a>
        </form>
    </div>
</body>
</html>
