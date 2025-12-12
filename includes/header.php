<?php
require_once 'admin/config.php';

$aktualniNovinka = null;

if (isset($conn)) {
    $sql = "SELECT text_zpravy FROM novinky WHERE aktivni = 1 ORDER BY id DESC LIMIT 1";
    
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $aktualniNovinka = mysqli_fetch_assoc($result);
    }
} else {
    echo "";
}
?>

<?php if ($aktualniNovinka): ?>
<header class="news-bar" id="newsBar">
    <div class="container">
        <p class="newsText" id="newsText">
            <?php echo htmlspecialchars($aktualniNovinka['text_zpravy']); ?>
        </p>
    </div>
</header>
<?php endif; ?>

<header class="main-header shifted">
    <div class="container">
        <h1><a href="index.php#hero"><img class="logo" src="assets/img/logo.png" alt=""></a></h1>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php#hero">Domů</a></li>
                <li><a href="index.php#onas">O nás</a></li>
                <li><a href="gallery.php">Fotogalerie</a></li>
                <li><a href="index.php#kontakt">Kontakt</a></li>
            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </div>
</header>