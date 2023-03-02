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

    <section id="search" class="page-content">
        <div class="container">
            <div class="row my-3">
                <div class="col-12">
                    <h1>Ricerca Articoli</h1>
                    <p>
                        <input type="text">

                    </p>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div id="results-list">
                            qui ci va il Component di REACTJS
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