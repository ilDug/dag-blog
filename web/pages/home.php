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

    <?php include __DIR__ . '/views/header.php'; ?>

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

    <script type="text/javascript" src="/dist/bundle.js"></script>
</body>

</html>