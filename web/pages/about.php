<!DOCTYPE html>
<html lang="it">

<head>
    <!-- META -->
    <?php
    \ilDug\Web\Meta::publish([
        "Chi è Simona | Simo Uniche Creazioni - About",
        "Simona: Creazioni di abiti, vestiti, zaini, accessori unici. Ecco chi sono e cosa faccio.",
        "/images/about1.jpeg",
        "https://simounichecreazioni.it/about",
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
                    <h3 class="text-muted"> <i class="fal fa-user-circle mr-3"></i> Chi sono</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb mb-0 float-end">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">about</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>




    <section id="about-section-banner" class="my-0 ">
        <div class="container">
            <div class="row p-5">
                <div class="col-sm-6 text-center mx-auto" style="min-height: 200px;">
                    <h1 class="mt-5"><a href="#" class="text-white">Made in Italy</a></h1>
                </div>
            </div>
        </div>
    </section>



    <section>
        <div class="container">
            <div class="row">

                <div class="col-lg-5 mt-5">
                    <h1><span class="underlined">Simona</span></h1>
                    <h2>uniche creazioni</h2>
                    <hr>
                    <p class="text-muted"> Questa sono io. </p>
                    <p class="text-muted">
                        <!-- Non trovo quasi mai le parole e dunque le prendo in prestito da chi ha già trovato le parole per
                        tutto. Mi capita spesso questo momento, soprattutto quando voglio fare un augurio a qualcuno a
                        cui tengo. Diciamo pure che anche in questo caso l’ augurio c’é, ed è per me.Per il mio
                        curriculum rimando alla mio profilo LinkedIn, qui vorrei solo esprimere cosa rappresenta per me
                        il mio lavoro che in queste pagine trovate riassunto e raccolto per immagini. -->

                        Sono Simona, una stilista di moda. <br>
                    </p>
                    <p class="text-muted">
                        Diplomata presso l’istituto di moda Burgo di Milano e laureata in linguaggi artistici contemporanei presso l’Accademia di Belle Arti di Bergamo.
                    </p>
                    <p class="text-muted">
                        La consapevolezza su quale fosse la mia strda è arrivata tardi ma non è un capitolo chiuso per come mi piace immaginarla. Cambiamo continuamente e cosa ci riserva il fututo non è dato sapere.
                    </p>

                </div>

                <div class="col-lg-7 mt-5">
                    <p class="mt-5">
                        <img src="/assets/images/about-4.jpg" alt="simona creations about" class="img-fluid">
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section style="background-color:#ececec;">
        <div class="container">
            <div class="row p-5">
                <div class="col-12 d-flex justify-content-center align-items-center flex-column text-muted">
                    <img src="assets/images/logo-round-dark-full.png" alt="" class="img-fluid" style="max-height:20rem">
                    <h1 class="mt-3 underlined">Uniche Creazioni</h1>
                    <h2>made in Italy</h2>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">

            <div class="row">

                <div class="col-lg-7 mt-5">
                    <p class="mt-1">
                        <img src="/assets/images/about-2.jpg" alt="simona creations about" class="img-fluid">
                    </p>
                </div>

                <div class="col-lg-5 mt-5">
                    <p class="text-muted">
                        <!-- Non trovo quasi mai le parole e dunque le prendo in prestito da chi ha già trovato le parole per
                        tutto. Mi capita spesso questo momento, soprattutto quando voglio fare un augurio a qualcuno a
                        cui tengo. Diciamo pure che anche in questo caso l’ augurio c’é, ed è per me.Per il mio
                        curriculum rimando alla mio profilo LinkedIn, qui vorrei solo esprimere cosa rappresenta per me
                        il mio lavoro che in queste pagine trovate riassunto e raccolto per immagini. -->
                        Ho sempre amato sporcarmi le mani e provare.  L’approccio teorico non ha mai funzionato per me se non in seconda battuta.

                    </p>
                    <p class="text-muted">

                        Perennemente divisa tra immaginazione e concretezza, il mio è un approccio completamente artigianale. 
                        Dal bozzetto alla realizzazione, seguo personalmente ogni fase cercando di proporre una moda priva di confini e stereotipi.
                    </p>
                </div>

            </div>




            <div class="row">
                <div class=" col-lg-6 mt-5">
                    <p class="text-muted">
                        Sogno una moda democratica ed etica che rispecchi solo e solamente chi la indossa.
                        Un ritorno alla qualità dei tessuti e la rivincita del "make to order" sul "make to stock" che così profondamente ha danneggiato, oltre che il nostro magnifico pianeta, anche l’immaginario collettivo a riguardo.

                    </p>

                    <p class="text-muted">
                        Si tratta di una cultura completamente da ricostruire scardinando falsi miti e individualismi, ma ottimi germogli di cambiamento si intravedono e questo mi da il coraggio di proseguire su questa strada.
                    </p>
                </div>

                <div class="col-lg-6 mt-3">
                    <p class="mt-5">
                        <img src="/assets/images/about-5.jpg" alt="simona creations about" class="img-fluid">
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
