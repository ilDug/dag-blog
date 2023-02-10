<!DOCTYPE html>
<html lang="it">

<head>
    <!-- META -->
    <?php

    \ilDug\Web\Meta::publish([
        "Mappa | Simo Uniche Creazioni",
        "dove trovarmi. Il mio laboratorio",
        "/images/about-1.jpg",
        "https://simounichecreazioni.it/jobs",
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
                    <h3 class="text-muted"> <i class="fal fa-map-marker-smile mr-3"></i> Dove trovarmi</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb mb-0 float-end">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">map</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section id="map">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <p><img src="assets/images/map-1.jpg" class="img-fluid w-100" alt=""></p>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <h1 class="text-center">il <span class="underlined">Laboratorio</span></h1>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4">
                    <p>
                        il laboratorio dove nascono le mie creazioni: <span class="text-info">via Borgo S.Pietro, 22 - Crema (CR)</span>
                    </p>
                    <p>
                        Vieni a trovarmi, oppure sfoglia il <a href="#">catalogo online </a>:
                    </p>
                    <p class="text-center">
                        <a href="#">
                            <span class="bigcartel-about align-middle ml-1" data-toggle="tooltip" title="SHOP ONLINE">
                                <img src="assets/images/logo-round-dark-full.png" alt="bigcartel" class="img-fluid" style="max-width: 10rem;">
                            </span>
                        </a>
                    </p>
                </div>

                <div class="col-lg-8">
                    <div id="simo-map-container">
                        <div id="simo-map" class="text-center">

                            <p id="map-placeholder" style="color:white; padding-top:1rem;"> Per visualizzare la mappa attiva il consenso dei cookies e ricarica la pagina <br> <a href="#" dcc-open>cookies settings</a></p>

                        </div>
                    </div>
                </div>
            </div>


            <div class="row my-3">
                <div class="col-md-4 mb-3 text-center"><img src="assets/images/map-2.jpg" alt="" class="img-fluid"></div>
                <div class="col-md-4 mb-3 text-center"><img src="assets/images/map-3.jpg" alt="" class="img-fluid"></div>
                <div class="col-md-4 mb-3 text-center"><img src="assets/images/map-4.jpg" alt="" class="img-fluid"></div>
            </div>
        </div>
    </section>



    <?php include __DIR__ . '/views/footer.php'; ?>
    <?php include __DIR__ . '/views/wa.html'; ?>

    <script type="text/javascript" src="dist/bundle.js">
    </script>

</body>

</html>
