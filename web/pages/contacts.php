<!DOCTYPE html>
<html lang="it">

<head>
    <!-- META -->
    <?php

    \ilDug\Web\Meta::publish([
        "Contatti | Simo Uniche Creazioni",
        "Contatti, Usa Il modulo di contatto per ricevere assistenza o informazioni ",
        "https://simounichecreazioni.it/assets/images/og-image1.jpg",
        "https://simounichecreazioni.it/contacts",
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
                    <h3 class="text-muted"> <i class="fal fa-at mr-3"></i>Contatti</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb mb-0 float-end">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">contatti</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section id="contacts">
        <div class="container mb-5">
            <div class="row">
                <div class="col-12 my-5">
                    <h1 class="text-center"><span class="underlined">Contatti</span></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-5">
                    <div class="contact-box card  p-4 shdw">
                        <h4>Come possiamo aiutarti?</h4>
                        <p><small>Siamo pronti a risolvere qualsiasi tuo dubbio, e se hai qualche lamentela o reclamo non esitare. Siamo qui per aiutarti.</small> </p>
                        <p><small>Compila i campi e scrivici di cosa hai bisogno. Se si tratta di un ordine che hai effettuato, indica sempre il codice dell'ordine</small> </p>

                        <p><strong>Telefono</strong>:<span class="text-info">392 1373004</span></p>
                        <p><strong>Laboratorio</strong>:<span class="text-success">via Borgo S.Pietro, 22 - Crema (CR)</span></p>
                        <p class="text-center" data-toggle="tooltip" title="mappa"><a href="/map"><i class="fad fa-map-marked text-info fa-3x"></i></a></p>
                    </div>

                    <div class="mt-5" id="contact-social">
                        <p>
                            <a href="https://www.facebook.com/simounichecreazioni/" target="_blank"><i class="fab fa-2x mx-3 fa-facebook"></i></a>
                            <a href="https://www.instagram.com/simounichecreazioni/" target="_blank"><i class="fab fa-2x mx-3 fa-instagram"></i></a>
                            <a href="https://www.pinterest.it/simonabarboni/" target="_blank"><i class="fab fa-2x mx-3 fa-pinterest"></i></a>
                        </p>
                    </div>
                </div>


                <div class="col-md-8">
                    <h3>I tuoi dati</h3>
                    <div id="contact-form-container">
                        <!-- REACT COMPONENT -->
                    </div>
                </div>

            </div>

        </div>
    </section>



    <?php include __DIR__ . '/views/footer.php'; ?>
    <?php include __DIR__ . '/views/wa.html'; ?>

    <script type="text/javascript" src="/dist/bundle.js"></script>
</body>

</html>