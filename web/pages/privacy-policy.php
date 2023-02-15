<!DOCTYPE html>
<html lang="it">

<head>
    <!-- META -->
    <?php

    \ilDug\Web\Meta::publish([
        "Privacy Policy | Simo Uniche Creazioni",
        "Privacy Policy",
        "https://simounichecreazioni.it/images/og-image1.jpg",
        "https://simounichecreazioni.it/privacy/policy",
    ]);
    \ilDug\Web\Scripts::run(['STRUCTURED_DATA'])
    ?>

    <!-- STYLES  -->
    <link rel="stylesheet" href="/dist/styles.css">
    <base href="/">
</head>

<body>

    <?php include __DIR__ . '/views/header.php'; ?>



    <section id="privacy-policy">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <h1 class="text-center"><span class="underlined">Privacy Policy</span></h1>
                    <nav class="nav nav-pills flex-column flex-sm-row justify-content-center mt-5">
                        <a class="text-sm-center nav-link active bg-danger" href="/privacy/policy">privacy policy</a>
                        <a class="text-sm-center nav-link text-danger" href="/privacy/cookies">Cookies policy</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container my-3">
            <div class="row">
                <div class="col-12">
                    <div id="privacy-policy-container">
                        <?php
                        $parsedown = new Parsedown();
                        $markdown = file_get_contents(__DIR__ . "/contents/policy-privacy.md");
                        echo $parsedown->text($markdown);
                        ?>
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