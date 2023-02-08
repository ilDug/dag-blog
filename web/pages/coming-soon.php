<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META -->
    <?php
    \ilDug\Web\Meta::publish([
        "Simona Uniche Creazioni - Abiti, Vestiti ed Accessori",
        "Abiti, Vestiti ed Accessori unici, fatti a mano con il cuore - made in Italy",
        "https://simounichecreazioni.it/assets/images/og-image1.jpg",
        "https://simounichecreazioni.it",
    ]);
    \ilDug\Web\Scripts::run(['STRUCTURED_DATA'])
    ?>
    <!-- STYLES  -->
    <link rel="stylesheet" href="dist/styles.css">
</head>

<body>


    <div id="cs-container">
        <div id="cs-header">
            <p>
                <a href="https://www.facebook.com/simounichecreazioni/" target="_blank"><i class="fab fa-2x mx-3 fa-facebook"></i></a>
                <a href="https://www.instagram.com/simounichecreazioni/" target="_blank"><i class="fab fa-2x mx-3 fa-instagram"></i></a>
                <a href="https://www.pinterest.it/simonabarboni/" target="_blank"><i class="fab fa-2x mx-3 fa-pinterest"></i></a>
            </p>

        </div>

        <div id="cs-content">
            <div class="logo"><img src="/assets/images/logo-round-light-full.png" alt=""></div>
            <h1>Coming Soon</h1>
            <p>
                <a href="/contacts"><i class="fa-light fa-email me-2"></i> contattaci</a>
                <a href="/map"><i class="fa-light fa-email me-2"></i> dove siamo</a>
            </p>
        </div>


        <div id="cs-footer">
            <p class="mb-0">© 2018 - <?php echo date('Y'); ?></p>
        </div>
    </div>


    <?php include __DIR__ . '/views/wa.html'; ?>
    <script type="text/javascript" src="/dist/bundle.js"></script>
</body>

</html>
