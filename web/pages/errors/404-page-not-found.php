<!DOCTYPE html>
<html lang="it">

<head>
    <!-- META -->
    <?php

    \ilDug\Web\Meta::publish([
        "DAG BLOG - il blog di DagTech - Page Not Found",
        "https://dagtech.it/blog/assets/images/dag-tech-logo-sq.png"
    ]);
    \ilDug\Web\Scripts::run(['GOOGLE_ANALYTICS'])
    ?>

    <!-- STYLES  -->
    <link rel="stylesheet" href="/blog/dist/styles.css">
    <base href="/">
</head>

<body>

    <?php include __DIR__ . '/../views/header.php'; ?>

    <section id="not-found-404" class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-12 content-404">
                    <h1><span class="underlined">Oooops!</span></h1>
                    <h2 class="text-center">sembra che non siamo risuciti a trovare la pagina che stai cercando</h2>
                    <h3 class="code-404">404</h3>
                    <p>ricomincia da qui...</p>
                    <p>link utili
                        <a href="/blog" class="mx-3">home</a>
                        <a href="/blog/search" class="mx-3">search</a>
                    </p>
                </div>
            </div>
        </div>
    </section>



    <?php include __DIR__ . '/../views/footer.php'; ?>

    <script type="text/javascript" src="/blog/dist/bundle.js"></script>
</body>

</html>