<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Najdi obrázek
    $stmt = $conn->prepare("SELECT obrazek FROM gallery WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $photo = $result->fetch_assoc();
        $filePath = "../uploads/" . $photo['obrazek'];

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $stmtDel = $conn->prepare("DELETE FROM gallery WHERE id = ?");
        $stmtDel->bind_param("i", $id);
        $stmtDel->execute();
        $stmtDel->close();
    }

    header("Location: dashboard.php?success=Fotografie byla smazána.");
    exit();
} else {
    header("Location: dashboard.php?error=Neplatné ID fotografie.");
    exit();
}
?>
