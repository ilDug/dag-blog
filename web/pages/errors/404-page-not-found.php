<!DOCTYPE html>
<html lang="it">

<head>
    <!-- META -->
    <?php

    \ilDug\Web\Meta::publish([
        "DAG BLOG - il blog di DagTech - Page Not Found",
        "https://blog.dagtech.it/assets/images/dag-tech-logo-sq.png"
    ]);
    \ilDug\Web\Scripts::run(['GOOGLE_ANALYTICS'])
    ?>

    <!-- STYLES  -->
    <link rel="stylesheet" href="/dist/styles.css">
    <base href="/">
</head>

<body>

    <?php include __DIR__ . '/../views/header.php'; ?>

    <section id="not-found-404">
        <div class="container">
            <div class="row">
                <div class="col-12 content-404">
                    <h1><span class="underlined">Oooops!</span></h1>
                    <h2 class="text-center">sembra che non siamo risuciti a trovare la pagina che stai cercando</h2>
                    <h3 class="code-404">404</h3>
                    <p>ricomincia da qui...</p>
                    <p>link utili
                        <a href="/" class="mx-3">home</a>
                        <a href="/about" class="mx-3">about</a>
                        <a href="/creations" class="mx-3">creazioni</a>
                        <a href="/contacts" class="mx-3">contatti</a>
                    </p>
                </div>
            </div>
        </div>
    </section>



    <?php include __DIR__ . '/../views/footer.php'; ?>

    <script type="text/javascript" src="/dist/bundle.js"></script>
</body>

</html>