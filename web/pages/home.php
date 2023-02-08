<!DOCTYPE html>
<html lang="it">

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

    <?php include __DIR__ . '/views/header.php'; ?>



    <section id="landing" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>
                        Simo Uniche
                        <span class="underlined">Creazioni </span>
                    </h1>
                    <h2 style="font-size:2rem;font-family:'Kodchasan'">
                        Sartoria moderna on-line
                    </h2>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="landing-image-container">

        </div>
    </section>

    <section id="features">
        <div class="container">
            <div class="row mt-4">


                <div class="col-12 text-center">
                    <h1>
                        Capi realizzati
                        <span class="underlined">sulle tue misure </span>
                    </h1>
                    <h2 style="font-family:'Kodchasan'">
                        <a href="" class="text-muted">Come odinarli?</a>
                    </h2>
                </div>


                <div class="col-sm-4">
                    <div class="home-feature-circle">
                        <span class="circle">
                            <img src="assets/images/home-icon-1.jpg" alt="">
                        </span>
                    </div>
                    <div class="home-feature-box">
                        <p>
                            <i class="fal fa-tshirt fa-2x"></i>
                        </p>
                        <h4>1</h4>
                        <h5 class="text-info">scegli il tuo capo</h5>
                        <p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus officiis consequatur quidem provident ipsa quam veritatis! Ratione obcaecati inventore eligendi debitis sint voluptate at quo, soluta vero labore ut! Deleniti?</small></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="home-feature-circle">
                        <span class="circle">
                            <img src="assets/images/home-icon-0.jpg" alt="">
                        </span>
                    </div>
                    <div class="home-feature-box">
                        <p>
                            <span class="">
                                <a href="#">
                                    <i class="fal fa-cut fa-2x"></i>
                                </a>
                            </span>
                        </p>
                        <h4>2</h4>
                        <h5 class="text-info">personalizzalo</h5>
                        <p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus officiis consequatur quidem provident ipsa quam veritatis! Ratione obcaecati inventore eligendi debitis sint voluptate at quo, soluta vero labore ut! Deleniti?</small></p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="home-feature-circle">
                        <span class="circle">
                            <img src="assets/images/home-icon-3.jpg" alt="">
                        </span>
                    </div>
                    <div class="home-feature-box">
                        <p>
                            <i class="fal fa-gift fa-2x"></i>
                        </p>
                        <h4>3</h4>
                        <h5 class="text-info">Lo realizziamo su misura per te</h5>
                        <p><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus officiis consequatur quidem provident ipsa quam veritatis! Ratione obcaecati inventore eligendi debitis sint voluptate at quo, soluta vero labore ut! Deleniti?</small></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="instagram-portfolio-section">

        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>
                        lasciati
                        <span class="underlined">ispirare</span>
                    </h1>
                </div>
            </div>

            <div class="row my-3">
                <div class="col-12">
                    <div id="instagram-portfolio-container">
                        <!-- REACT ELEMENT -->
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="landing-banner">
        <div class="container">
            <div class="row p-5">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 text-center">
                    <h1 class="mt-5">contatti</h1>
                    <p><small>SIMONA UNICHE CREAZIONI <br> made in Italy</small> </p>
                    <a href="#" class="btn btn-outline-light btn-lg">contatti</a>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </section>




    <section class="home-article">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p>
                        <img src="assets/images/home-1.jpg" class="img-fluid" alt="">
                    </p>
                </div>
                <div class="col-sm-6">
                    <h1>Hai dei <span class="underlined">dubbi?</span></h1>
                    <h2 style="font-family:'Kodchasan'">
                        <a href="/contacts" class="text-muted">richiedi consulenza</a>
                    </h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, dolorem! Repudiandae repellat sit voluptatem itaque sequi, laboriosam quis vel nihil voluptates. Ullam repellendus minus iste porro beatae repudiandae, explicabo labore.

                        Aliquid ipsa distinctio itaque dicta nisi. Dolore beatae sequi aspernatur eligendi illo aliquam aperiam omnis blanditiis, ipsam provident quod similique dicta assumenda ratione voluptatum id odio. In voluptatum ex veritatis.
                    </p>
                    <p>
                        <a href="/contacts" class="btn btn-primary">contatti</a>
                    </p>
                </div>
            </div>
        </div>
    </section>


    <?php include __DIR__ . '/views/footer.php'; ?>
    <?php include __DIR__ . '/views/wa.html'; ?>

    <script type="text/javascript" src="/dist/bundle.js"></script>
</body>

</html>
