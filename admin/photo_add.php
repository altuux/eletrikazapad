<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST['photoTitle']);
    $file = $_FILES['photoFile'];
    $uploadDir = "../uploads/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if ($file['error'] !== UPLOAD_ERR_OK) {
        header("Location: dashboard.php?error=Chyba při nahrávání souboru.");
        exit();
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
    if (!in_array($file['type'], $allowedTypes)) {
        header("Location: dashboard.php?error=Povoleny jsou pouze obrázky (JPG, PNG, WEBP).");
        exit();
    }

    $fileName = time() . "_" . preg_replace('/\s+/', '_', basename($file['name']));
    $filePath = $uploadDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $filePath)) {
        $stmt = $conn->prepare("INSERT INTO gallery (nazev, obrazek) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $fileName);
        $stmt->execute();
        $stmt->close();

        header("Location: dashboard.php?success=1");
        exit();
    } else {
        header("Location: dashboard.php?error=Chyba při ukládání souboru.");
        exit();
    }
}
?>
