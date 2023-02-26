<!DOCTYPE html>
<html lang="it">

<head>
    <!-- META -->
    <?php

    \ilDug\Web\Meta::publish([
        "DAG BLOG - il blog di DagTech",
        "https://blog.dagtech.it/assets/images/dag-tech-logo-sq.png"
    ]);
    \ilDug\Web\Scripts::run(['GOOGLE_ANALYTICS'])
    ?>

    <!-- STYLES  -->
    <link rel="stylesheet" href="/dist/styles.css">
</head>

<body>

    <?php include __DIR__ . '/views/header.php';
    ?>

    <!-- <section id="home" class="page-content">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <div id="landing">
                        <h1>Dag Blog</h1>
                        <p>
                            <img src="/assets/images/dag-tech-logo-sq.png" alt="" class="home-logo img-fluid">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section id="home" class="page-content">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <div id="landing">



                        <div id="home-title">
                            <h1>Dag Blog </h1>
                            <h2>il blog di <span class="underlined">Dag Tech</span>
                            </h2>
                        </div>

                        <div id="home-motto">

                            <p>
                                <img src="/assets/images/dag-tech-logo-sq.png" alt="" class="home-logo img-fluid">
                            </p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem exercitationem pariatur obcaecati nostrum? Ea, recusandae eius doloremque explicabo atque ipsa unde eos quasi optio tempora in nemo voluptate. Maxime, ipsum!</p>

                            <p class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </p>
                        </div>

                        <div class="home-article">
                            <div class="card h-100">
                                <img src=" ..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>


                        <div class="home-article">
                            <div class="card h-100">
                                <img src=" ..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>


                        <div class="home-article">
                            <div class="card h-100">
                                <img src=" ..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>


                        <div class="home-article">
                            <div class="card h-100">
                                <img src=" ..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>


                        <div class="home-article">
                            <div class="card h-100">
                                <img src=" ..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>


                        <div class="home-article">
                            <div class="card h-100">
                                <img src=" ..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>








                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/views/footer.php'; ?>

    <script type="text/javascript" src="/dist/bundle.js"></script>
</body>

</html>