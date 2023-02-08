<!DOCTYPE html>
<html lang="it">

<head>
    <!-- META -->
    <?php
    \ilDug\Web\Meta::publish([
        "Cosa posso fare per te | Simo Uniche Creazioni",
        "Cosa posso fare per te? Abigliamento,  accessori, idee regalo, corsi e workshop",
        "/images/about-3.jpg",
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
                    <h3 class="text-muted"> <i class="fal fa-user-circle mr-3"></i> Cosa posso fare per te</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb mb-0 float-end">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">my job</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section id="jobs">
        <div class="container">
            <div class="row my-3">
                <div class="col-lg-6">

                    <div class="row" id="job-1">
                        <div class="j1-box">
                            <div class="j1-item"><img src="assets/images/jobs-16.jpg" alt="" class=""></div>
                        </div>
                        <div class="j1-box">
                            <div class="j1-item"><img src="assets/images/jobs-7.jpg" alt="" class=""></div>
                        </div>
                        <div class="j1-box">
                            <div class="j1-item"><img src="assets/images/jobs-3.jpg" alt="" class=""></div>
                        </div>
                        <div class="j1-box">
                            <div class="j1-item"><img src="assets/images/jobs-4.jpg" alt="" class=""></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h1 class="mt-3" style="font-size: 3rem; font-weight:bolder;">Abbigliamento ed accessori <span class="underlined">su misura</span></h1>

                    <p class="mt-3">Capi e accessori personalizzabili in taglia, modello, tessuto e dettagli.
                        Studiati per esaltare le tue caratteristiche e la tua personalità.
                        Non solo tessuto ma anche maglieria a ferri e uncinetto.
                    </p>
                    <p class="text-end mt-5">
                        <a href="/contacts" class="btn btn-info">contattami</a>
                    </p>
                </div>
            </div>


            <div class="row my-3">
                <div class="col-12">
                    <h1 class="mt-3" style="font-size: 3rem; font-weight:bolder;"><span class="underlined">Idee regalo</span></h1>

                    <p class="mt-3">Se cerchi un idea regalo originale o ne hai già una, raccontamela e insieme creeremo un regalo davvero unico e irripetibile ma soprattutto realizzato a mano solo e solamente per il festeggiato.

                    </p>

                </div>

                <div class="col-lg-12">

                    <div class="row" id="job-2">
                        <div class="col-md-4 p-1">
                            <div class="j2-item"><img src="assets/images/jobs-11.jpg" alt="" class=""></div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="j2-item"><img src="assets/images/jobs-12.jpg" alt="" class=""></div>
                        </div>
                        <div class="col-md-4 p-1">
                            <div class="j2-item"><img src="assets/images/jobs-15.jpg" alt="" class=""></div>
                        </div>

                    </div>
                </div>

            </div>


            <div class="row my-3">
                <div class="col-12 text-center">
                    <h1 class="mt-3" style="font-size: 3rem; font-weight:bolder;">Corsi e <span class="underlined">work shop</span></h1>

                    <p class="mt-3">Coming soon...

                    </p>
                </div>
            </div>

        </div>
    </section>



    <?php include __DIR__ . '/views/footer.php'; ?>
    <?php include __DIR__ . '/views/wa.html'; ?>

    <script type="text/javascript" src="/dist/bundle.js">
    </script>

</body>

</html>
