<?php
// index.php
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Elektrika Západ – fotovoltaika, elektroinstalace a servis v Plzni a Karlovarském kraji. Kompletní řešení od návrhu po realizaci.">
    <meta name="keywords" content="elektrikář Plzeň, fotovoltaika Plzeň, elektroinstalace Karlovy Vary, solární panely západní Čechy, montáž FVE Plzeň, Elektrika Západ">
    <title>Elektrika Západ – Fotovoltaika a elektroinstalace Plzeň & Karlovarský kraj</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <?php include "includes/header.php" ?>

    <main>
        <section id="hero" class="hero">
            <div class="hornitext">
                <h1>Kompletní elektroinstalace<br> a fotovoltaika na klíč</h1>
            </div>
            <div class="buttons">
                <a class="vice" href="#onas">více</a>
                <a class="sluzby" href="#kontakt">Objednat službu</a>
            </div>
        </section>

        <section id="onas" class="onas">
            <div class="container">
                <div class="upper">
                    <h1>O nás</h1>
                    <a href="http://" target="_blank" rel="noopener noreferrer">
                        Jsme profesionální elektroinstalační firma elektrikazápad, která zajišťuje kompletní služby
                        v oblasti elektroinstalace a fotovoltaiky (FVE) pro rodinné domy
                        Zajistíme vám nejen montáž, ale také vyřízení dotací, aby byla vaše investice co nejvýhodnější.
                    </a>
                </div>
            </div>ntaktujte nás</h1>
                <div 
        </section>

        <section id="kontakt" class="contact">
            <div class="container">
                <h1>Koclass="form-wrapper">
                    <form action="" method="post" class="contact-form">
                        <div class="form-group">
                            <label for="name">Jméno a příjmení *</label>
                            <input type="text" id="name" name="name" placeholder="Vaše jméno" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail *</label>
                            <input type="email" id="email" name="email" placeholder="Váš e-mail" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefon</label>
                            <input type="tel" id="phone" name="phone" placeholder="Váš telefon">
                        </div>
                        <div class="checkbox-group">
                            <label for="accept">
                                <input type="checkbox" id="accept" name="accept" required>
                                <span class="custom-checkbox"></span>
                                Souhlasím se zpracováním osobních údajů
                            </label>
                        </div>
                        <button type="submit" class="submit-btn">Vybrat Službu</button>
                    </form>

                    <div class="info">
                        <h3>Naše kontakty</h3>
                        <div class="contacts">
                            <div class="contact-card">
                                <h4>Lukáš</h4>
                                <ul>
                                    <li><span class="icon phone"></span>+420 123 456 789</li>
                                    <li><span class="icon mail"></span>info@firma.cz</li>
                                    <li><span class="icon map"></span>Ulice 123, Město</li>
                                </ul>
                            </div>
                            <div class="contact-card">
                                <h4>Martin</h4>
                                <ul>
                                    <li><span class="icon phone"></span>+420 987 654 321</li>
                                    <li><span class="icon mail"></span>martin@firma.cz</li>
                                    <li><span class="icon map"></span>Jiná ulice 45, Město</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include "includes/footer.php" ?>
</body>
<script src="assets/burger.js"></script>
<script src="assets/spy.js"></script>
</html>