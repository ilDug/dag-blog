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

                        <div id="home-motto" class="text-start">

                            <p class="text-center">
                                <img src="/assets/images/dag-tech-logo-sq.png" alt="" class="home-logo img-fluid">
                            </p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem exercitationem pariatur obcaecati nostrum? Ea, recusandae eius doloremque explicabo atque ipsa unde eos quasi optio tempora in nemo voluptate. Maxime, ipsum!</p>

                            <p class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Ricerca articoli</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="...">
                            </p>
                        </div>

                        <div class="home-article">
                            <div class="card h-100 d-flex flex-column">
                                <div class="card-img-container">
                                    <img src="%IMGSRC%" class="" alt="%IMGALT%">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="%LINK%">%TITLE%</a></h5>
                                    <p class="card-text">%SUMMARY%</p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <em class="me-3"><i class="fa-light fa-calendar ms-2 me-1"></i> %DATE%</em>
                                        </small>
                                        <br>
                                        <small class="text-muted">
                                            %TAGS%
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="home-article">
                            <div class="card h-100 d-flex flex-column">
                                <div class="card-img-container">
                                    <img src="%IMGSRC%" class="" alt="%IMGALT%">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="%LINK%">%TITLE%</a></h5>
                                    <p class="card-text">%SUMMARY%</p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <em class="me-3"><i class="fa-light fa-calendar ms-2 me-1"></i> %DATE%</em>
                                            <strong class="me-3"><i class="fa-brands fa-github ms-2 me-1"></i> %AUTHOR%</strong>
                                        </small>
                                        <br>
                                        <small class="text-muted">
                                            %TAGS%
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="home-article">
                            <div class="card h-100 d-flex flex-column">
                                <div class="card-img-container">
                                    <img src="%IMGSRC%" class="" alt="%IMGALT%">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="%LINK%">%TITLE%</a></h5>
                                    <p class="card-text">%SUMMARY%</p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <em class="me-3"><i class="fa-light fa-calendar ms-2 me-1"></i> %DATE%</em>
                                            <strong class="me-3"><i class="fa-brands fa-github ms-2 me-1"></i> %AUTHOR%</strong>
                                        </small>
                                        <br>
                                        <small class="text-muted">
                                            %TAGS%
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="home-article">
                            <div class="card h-100 d-flex flex-column">
                                <div class="card-img-container">
                                    <img src="%IMGSRC%" class="" alt="%IMGALT%">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="%LINK%">%TITLE%</a></h5>
                                    <p class="card-text">%SUMMARY%</p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <em class="me-3"><i class="fa-light fa-calendar ms-2 me-1"></i> %DATE%</em>
                                            <strong class="me-3"><i class="fa-brands fa-github ms-2 me-1"></i> %AUTHOR%</strong>
                                        </small>
                                        <br>
                                        <small class="text-muted">
                                            %TAGS%
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="home-article">
                            <div class="card h-100 d-flex flex-column">
                                <div class="card-img-container">
                                    <img src="%IMGSRC%" class="" alt="%IMGALT%">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="%LINK%">%TITLE%</a></h5>
                                    <p class="card-text">%SUMMARY%</p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <em class="me-3"><i class="fa-light fa-calendar ms-2 me-1"></i> %DATE%</em>
                                            <strong class="me-3"><i class="fa-brands fa-github ms-2 me-1"></i> %AUTHOR%</strong>
                                        </small>
                                        <br>
                                        <small class="text-muted">
                                            %TAGS%
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <div class="home-article">
                            <div class="card h-100 d-flex flex-column">
                                <div class="card-img-container">
                                    <img src="%IMGSRC%" class="" alt="%IMGALT%">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="%LINK%">%TITLE%</a></h5>
                                    <p class="card-text">%SUMMARY%</p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <em class="me-3"><i class="fa-light fa-calendar ms-2 me-1"></i> %DATE%</em>
                                            <strong class="me-3"><i class="fa-brands fa-github ms-2 me-1"></i> %AUTHOR%</strong>
                                        </small>
                                        <br>
                                        <small class="text-muted">
                                            %TAGS%
                                        </small>
                                    </p>
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