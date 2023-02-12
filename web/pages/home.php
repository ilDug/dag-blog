<!DOCTYPE html>
<html lang="it">

<head>
    <!-- META -->
    <?php
    // \ilDug\Web\Meta::publish([
    //     "Simona Uniche Creazioni - Abiti, Vestiti ed Accessori",
    //     "Abiti, Vestiti ed Accessori unici, fatti a mano con il cuore - made in Italy",
    //     "https://simounichecreazioni.it/assets/images/og-image1.jpg",
    //     "https://simounichecreazioni.it",
    // ]);
    // \ilDug\Web\Scripts::run(['STRUCTURED_DATA'])
    ?>

    <!-- STYLES  -->
    <link rel="stylesheet" href="/dist/styles.css">
</head>

<body>

    <?php include __DIR__ . '/views/header.php';
    ?>

    <section id="home" class="page-content">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-2"></div>
                <div class="col-lg-7">
                    <article class="article">
                        <?php echo $post->body; ?>
                    </article>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/views/footer.php';
    ?>

    <script type="text/javascript" src="/dist/bundle.js"></script>
</body>

</html>