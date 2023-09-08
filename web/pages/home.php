<!DOCTYPE html>
<html lang="it">

<head>
    <!-- META -->
    <?php
    \ilDug\Web\Meta::publish([
        "DAG BLOG - il blog di DagTech",
        "https://dagtech.it/blog/assets/images/dag-tech-logo-sq.png"
    ]);
    \ilDug\Web\Scripts::run(['GOOGLE_ANALYTICS']);
    ?>

    <!-- STYLES  -->
    <link rel="stylesheet" href="/blog/dist/styles.css">
</head>

<body>

    <?php include __DIR__ . '/views/header.php'; ?>

    <section id="home" class="page-content">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="" fill-opacity="1" d="M0,128L480,192L960,256L1440,64L1440,0L960,0L480,0L0,0Z"></path>
        </svg>

        <div class="container">
            <div class="row my-3">
                <div class="col-12">
                    <div id="landing">

                        <div id="home-title">
                            <h1>Dag Blog </h1>
                            <h2>il blog di <span class="underlined">Dag Tech</span>
                            </h2>
                        </div>

                        <div id="home-motto" class="text-start">

                            <p class="text-center">
                                <img src="/blog/assets/images/dag-tech-logo-sq.png" alt="" class="home-logo img-fluid">
                            </p>
                            <p>
                                <em>"La tecnologia cambia velocemente, ma appoggia su solide basi."</em> Articoli, guide e consigli per aiutare gli sviluppatori a trovare soluzioni, ampliare competenze e migliorare l'esperienza di programmazione.
                            </p>

                            <p class="mb-3 mt-5 text-center">
                                <a href="/blog/search" class="btn btn-primary">
                                    <i class="fa-light fa-magnifying-glass me-2 "></i>
                                    Ricerca Articoli
                                </a>
                            </p>
                        </div>


                        <?php
                        $articles = \DAG\Blog::load(6);
                        foreach ($articles as $a) {
                            $card = new \ilDug\Template(__DIR__ . "/templates/article_home_template.html");
                            $card->compile(array(
                                "%IMGSRC%" => $a->image->src,
                                "%IMGALT%" => $a->image->alt,
                                "%LINK%" => $a->metadata->url,
                                "%TITLE%" => $a->metadata->title,
                                "%SUMMARY%" => $a->summary,
                                "%DATE%" => $a->metadata->update,
                                "%TAGS%" => implode('', $a->tags),
                                "%AUTHOR%" => $a->metadata->author
                            ));
                            echo $card->payload;
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/views/footer.php'; ?>

    <script type="text/javascript" src="/blog/dist/bundle.js"></script>
</body>

</html>