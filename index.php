<?php
// index.php
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Elektrika-Západ - fotovoltaika, elektroinstalace a servis v Plzni a Karlovarském kraji. Kompletní řešení od návrhu po realizaci.">
    <meta name="keywords" content="Elektrika-Západ, elektrikář Plzeň, fotovoltaika Plzeň, elektroinstalace Karlovy Vary, solární panely západní Čechy, montáž FVE Plzeň, Elektrika Západ">
    <title>Elektrika-Západ | Domovská stránka – Fotovoltaika a elektroinstalace Plzeň & Karlovarský kraj</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/modal.css">
    <script src="https://kit.fontawesome.com/9cdcfc018e.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include "includes/header.php" ?>

    <main>
        <section id="hero" class="hero-split">
            <div class="hero-content">
                <div class="hero-text-wrapper">
                    <h1>Kompletní elektroinstalace<br> a fotovoltaika na klíč</h1>
                    <p class="hero-perex">
                        Zajistíme pro vás vše od návrhu přes montáž až po revizi. 
                        Specializujeme se na Plzeň a Karlovarský kraj.
                    </p>
                    <div class="buttons">
                        <a class="sluzby" href="#kontakt">Objednat službu</a>
                        <a class="vice" href="#onas">Více o nás</a>
                    </div>
                </div>
            </div>

            <div class="hero-image">
                </div>
        </section>

        <section id="onas" class="onas">
            <div class="upper">
                <div class="section-header">
                    <h1>O nás</h1>
                    <p>Jsme profesionální elektroinstalační firma <strong>PH-Elektro</strong>. Zajišťujeme kompletní služby od A do Z pro rodinné domy i firmy. Vaše investice je u nás v bezpečí.</p>
                </div>
                
                <div class="boxContainer">
                    <div class="Box">
                        <div class="icon-header"><i class="fa-solid fa-plug-circle-bolt"></i></div>
                        <h2>Elektroinstalace</h2>
                        <p>Kompletní řešení pro rodinné domy a byty. Od návrhu přes sekání drážek až po finální kompletaci.</p>
                        <ul>
                            <li>Nové instalace i rekonstrukce</li>
                            <li>Rozvody v domech a bytech</li>
                            <li>Montáž rozvaděčů a jističů</li>
                            <li>Kompletace zásuvek a vypínačů</li>
                            <li>Revize elektroinstalací</li>
                        </ul>
                    </div>

                    <div class="Box highlight">
                        <div class="icon-header"><i class="fa-solid fa-solar-panel"></i></div>
                        <h2>Fotovoltaika na klíč</h2>
                        <p>Vyrábějte vlastní energii. Postaráme se o vše od projektu až po vyřízení dotace NZÚ.</p>
                        <ul>
                            <li>Projektová dokumentace a statika</li>
                            <li>Vyřízení dotace NZÚ</li>
                            <li>Připojení k síti (ČEZ, E.ON, PRE)</li>
                            <li>Revizní zpráva</li>
                            <li>Servis a monitoring</li>
                        </ul>
                    </div>

                    <div class="Box">
                        <div class="icon-header"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                        <h2>Servis a údržba</h2>
                        <p>Rychlý servisní zásah v případě poruchy. Pravidelné kontroly a údržba vašich zařízení.</p>
                        <ul>
                            <li>Opravy elektroinstalací</li>
                            <li>Výměny jističů</li>
                            <li>Zapojení spotřebičů</li>
                            <li>Havarijní služba</li>
                            <li>Pravidelné revize</li>
                        </ul>
                    </div>
                </div>

                <div class="cta">
                    <a href="#kontakt" class="vice">Kontaktujte nás</a>
                </div>
            </div>
        </section>

        <section id="kontakt" class="contact">
            <div class="container">
                <h1>Kontaktujte nás</h1>

                <div class="form-wrapper">
                    <form id="mainForm" class="contact-form">
                        <input type="hidden" name="access_key" value="...">
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
                            <label for="phone">Telefon *</label>
                            <input type="tel" id="phone" name="phone" placeholder="Váš telefon">
                        </div>
                        <div class="checkbox-group">
                            <label for="accept">
                                <input type="checkbox" id="accept" name="accept" required>
                                <span class="custom-checkbox"></span>
                                Souhlasím se zpracováním osobních údajů
                            </label>
                        </div>
                        <button type="button" class="submit-btn" id="openModal">Vybrat Službu</button>
                    </form>

                    <div id="serviceModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <h4>Další informace</h4>
                            <div class="form-group">
                                <label for="service">Vyberte službu *</label>
                                <select id="service" name="service" required>
                                    <option value="">Vyberte - viz sekce: O nás</option>
                                    <option value="sluzba1">Elektroinstalace</option>
                                    <option value="sluzba2">FVE na klíč</option>
                                    <option value="sluzba3">Servis a údržba</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="note">Poznámka</label>
                                <textarea id="note" name="note" placeholder="Vaše poznámka"></textarea>
                            </div>
                            <button type="button" id="submitAll">Odeslat vše</button>
                        </div>
                    </div>

                    <div class="info">
                        <h3>Naše kontakty</h3>
                        <div class="contacts">
                            <div class="contact-card">
                                <h4>Lukáš Hošťálek</h4>
                                <ul>
                                    <li><span class="icon phone"><i class="fa-solid fa-phone"></i></span>+420 775 970 243</li>
                                    <li><span class="icon mail"><i class="fa-solid fa-envelope"></i></span><a href="mailto:lukashostalek@seznam.cz">lukashostalek@seznam.cz</a></li>
                                    <li><span class="icon map"><i class="fa-solid fa-location-dot"></i></span>Ulice 123, Město</li>
                                </ul>
                            </div>
                            <div class="contact-card">
                                <h4>Lukáš Pokorný</h4>
                                <ul>
                                    <li><span class="icon phone"><i class="fa-solid fa-phone"></i></span>+420 721 332 556</li>
                                    <li><span class="icon mail"><i class="fa-solid fa-envelope"></i></span><a href="mailto:ompokorny@seznam.cz">ompokorny@seznam.cz</a></li>
                                    <li><span class="icon map"><i class="fa-solid fa-location-dot"></i></span>Jiná ulice 45, Město</li>
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
<script src="assets/modal.js"></script>
<script src="assets/news.js"></script>
</html>