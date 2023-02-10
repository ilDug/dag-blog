<!DOCTYPE html>
<html lang="it">

<head>
    <!-- META -->
    <?php
    \ilDug\Web\Meta::publish([
        "Le creazioni di Simona | Portfolio",
        "Le migliori creazioni di Simona. Galleria delle immagini degli abiti, dei vestiti e degli accessori creati da Simona Uniche Creazioni",
        "https://simounichecreazioni.it/images/og-image1.jpg",
        "https://simounichecreazioni.it/creations",
    ]);
    \ilDug\Web\Scripts::run(['STRUCTURED_DATA'])
    ?>

    <!-- STYLES  -->
    <link rel="stylesheet" href="dist/styles.css">
</head>

<body>

    <?php include __DIR__ . '/views/header.php'; ?>

    <div class="subheader">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="text-muted"> <i class="fal fa-camera mr-3"></i>Portfolio</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb mb-0 float-end">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">creations</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 mt-5 mx-auto">
                    <h1 class="text-center"><span class="underlined">Creazioni</span></h1>

                    <p>Benvenuto in un un piccolo armadio antico, è di legno, vero. Profuma della vita che è trascorsa e
                        dei capi che ha accolto dentro di s&egrave;, delle mode del momento e delle certezze di Stile.
                    </p>

                    <p>Lui non giudica. È troppo saggio per farlo. Fruga finché avrai saziato la tua curiositá, perdi
                        pure il tuo tempo e torna tutte le volte che vorrai stare in sua compagnia.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mt-3 text-center">
                        <h3 class="mb-0 text-primary">Instagram Feed <br><br>
                            <a href="#">
                                <span class="bigcartel-creations-banner">
                                    <img src="assets/images/logo-round-dark-full.png" alt="bigcartel" class="img-fluid" title="shop online" style="max-width: 12rem;">
                                </span>
                            </a>
                        </h3>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <section id="instagram-portfolio">
        <div class="container">
            <div class="row my-3">
                <div class="col-12">
                    <div id="instagram-portfolio-grid"></div>
                </div>
            </div>
        </div>
    </section>


    <?php include __DIR__ . '/views/footer.php'; ?>
    <?php include __DIR__ . '/views/wa.html'; ?>

    <script type="text/javascript" src="dist/bundle.js">
    </script>
</body>

</html>
