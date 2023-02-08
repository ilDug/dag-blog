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

    <div class="subheader">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="text-muted text-center"> <i class="fal fa-at mr-3"></i>Privacy</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb mb-0 float-end">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/">privacy</a></li>
                        <li class="breadcrumb-item active" aria-current="page">policy</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section id="privacy-policy">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <h1 class="text-center"><span class="underlined">Privacy Policy</span></h1>
                    <nav class="nav nav-pills flex-column flex-sm-row justify-content-center mt-5">
                        <a class="text-sm-center nav-link active bg-info" href="/privacy/policy">privacy policy</a>
                        <a class="text-sm-center nav-link text-info" href="/privacy/cookies">Cookies policy</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container my-3">
            <div class="row">
                <div class="col-12">
                    <a href="https://www.iubenda.com/privacy-policy/46549283" class="iubenda-white no-brand iubenda-embed  iub-body-embed" title="Privacy Policy">Privacy Policy</a>

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
    <?php include __DIR__ . '/views/wa.html'; ?>

    <script type="text/javascript" src="/dist/bundle.js"></script>
</body>

</html>
