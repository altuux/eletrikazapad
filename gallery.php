<?php
require_once 'admin/config.php';

$sql_gallery = "SELECT * FROM gallery ORDER BY datum DESC";
$result_gallery = $conn->query($sql_gallery);
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PH-Elektro - fotovoltaika, elektroinstalace a servis v Plzni a Karlovarském kraji. Kompletní řešení od návrhu po realizaci.">
    <meta name="keywords" content="PH-Elektro, elektrikář Plzeň, fotovoltaika Plzeň, elektroinstalace Karlovy Vary, solární panely západní Čechy, montáž FVE Plzeň, Elektrika Západ">
    <title>PH-Elektro | Fotogalerie</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/galleryStyle.css">
</head>
<body>
    <?php include "includes/header.php" ?>

    <main class="gallerySection">
        <div class="container">
            <h1>Fotogalerie realizací</h1>
            <p class="subtitle">Ukázky naší práce v oblasti fotovoltaiky a elektroinstalací</p>

            <div class="galleryGrid">
                <?php if ($result_gallery && $result_gallery->num_rows > 0): ?>
                    <?php $index = 0; ?>
                    <?php while ($row = $result_gallery->fetch_assoc()): ?>
                        <div class="galleryItem">
                            <img src="uploads/<?php echo htmlspecialchars($row['obrazek']); ?>"
                                alt="<?php echo htmlspecialchars($row['nazev']); ?>"
                                data-index="<?php echo $index++; ?>"
                                data-full="uploads/<?php echo htmlspecialchars($row['obrazek']); ?>">
                            <p><?php echo htmlspecialchars($row['nazev']); ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Galerie je zatím prázdná.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <div id="lightbox" class="lightbox">
        <span class="closeBtn">&times;</span>
        <img id="lightboxImg" src="" alt="">
        <div class="navBtn prevBtn">&#10094;</div>
        <div class="navBtn nextBtn">&#10095;</div>
    </div>

    <?php include "includes/footer.php" ?>
    <script src="assets/gallery.js"></script>
    <script src="assets/news.js"></script>
</body>
</html>