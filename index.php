<?php
// index.php
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PH-Elektro - fotovoltaika, elektroinstalace a servis v Plzni a Karlovarském kraji. Kompletní řešení od návrhu po realizaci.">
    <meta name="keywords" content="PH-Elektro, elektrikář Plzeň, fotovoltaika Plzeň, elektroinstalace Karlovy Vary, solární panely západní Čechy, montáž FVE Plzeň, Elektrika Západ">
    <title>PH-Elektro | Domovská stránka – Fotovoltaika a elektroinstalace Plzeň & Karlovarský kraj</title>
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
        <div class="upper">
            <h1>O nás</h1>
            <p>Jsme profesionální elektroinstalační firma PH-Elektro, která zajišťuje kompletní služby v oblasti elektroinstalace a fotovoltaiky (FVE) pro rodinné domy. Zajistíme Vám nejen montáž, ale také vyřízení dotací, aby byla vaše investice co nejvýhodnější.</p>
            <div class="boxContainer">

            <div class="prvniBox">
                <h2>Kompletní elektroinstalace od A do Z</h2>
                <p>Provádíme elektroinstalace v rodinných domech, bytech i dalších objektech. Zajistíme vše potřebné – od návrhu přes montáž až po revizi.</p>
                <ul>
                <li>Nové elektroinstalace i rekonstrukce</li>
                <li>Rozvody v domech a bytech</li>
                <li>Instalace rozvaděčů, jističů a chráničů</li>
                <li>Montáž zásuvek, vypínačů a osvětlení</li>
                <li>Revize elektroinstalací</li>
                </ul>
            </div>

            <div class="druhyBox">
                <h2>Fotovoltaika na klíč</h2>
                <p>U nás získáte kompletní řešení fotovoltaické elektrárny (FVE) na klíč. Postaráme se o všechno – od návrhu po připojení k distribuční síti.</p>
                <ul>
                <li>Projekt a statika</li>
                <li>Revizní zpráva a normy</li>
                <li>Vyřízení dotace NZÚ</li>
                <li>Připojení k síti ČEZ / E.ON / PRE</li>
                <li>Servis a monitoring</li>
                </ul>
            </div>

            </div>

            <div class="cta">
            <a href="#kontakt">Kontaktujte nás</a>
            </div>
        </div>
        </section>

        <section id="kontakt" class="contact">
            <div class="container">
                <h1>Kontaktujte nás</h1>

                <div class="form-wrapper">
                    <form action="" method="post" class="contact-form">
                        <h4>Kontaktní formulář</h4>
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
                                <h4>Lukáš Hošťálek</h4>
                                <ul>
                                    <li><span class="icon phone"></span>+420 775 970 243</li>
                                    <li><span class="icon mail"></span><a href="mailto:lukashostalek@seznam.cz">lukashostalek@seznam.cz</a></li>
                                    <li><span class="icon map"></span>Ulice 123, Město</li>
                                </ul>
                            </div>
                            <div class="contact-card">
                                <h4>Lukáš Pokorný</h4>
                                <ul>
                                    <li><span class="icon phone"></span>+420 721 332 556</li>
                                    <li><span class="icon mail"></span><a href="mailto:ompokorny@seznam.cz">ompokorny@seznam.cz</a></li>
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