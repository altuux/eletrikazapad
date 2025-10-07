<?php
// Nastavení připojení k databázi
$db_host = 'localhost';
$db_user = 'root';
$db_password = 'root';
$db_db = 'elektrikazapad';

// Připojení k MySQL
$conn = new mysqli($db_host, $db_user, $db_password, $db_db);

// Kontrola připojení
if ($conn->connect_error) {
    die("Chyba připojení k databázi: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
