<!DOCTYPE html>
<html lang="it">

<head>
    <!-- META -->
    <?php
    \ilDug\Web\Meta::publish([
        "DAG BLOG - il blog di DagTech - Privacy policy",
        "https://dagtech.it/blog/assets/images/dag-tech-logo-sq.png"
    ]);
    \ilDug\Web\Scripts::run(['GOOGLE_ANALYTICS']);
    ?>

    <!-- STYLES  -->
    <link rel="stylesheet" href="https://kit.fontawesome.com/b4eb529ed9.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/blog/dist/styles.css">
    <!-- <base href="/blog/"> -->
</head>

<body>
    <?php include __DIR__ . '/views/header.php'; ?>

    <section id="privacy-policy">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <h1 class="text-center"><span class="underlined">Privacy Policy</span></h1>
                    <nav class="nav nav-pills flex-column flex-sm-row justify-content-center mt-5">
                        <a class="text-sm-center nav-link active bg-danger" href="/blog/privacy/policy">privacy policy</a>
                        <a class="text-sm-center nav-link text-danger" href="/blog/privacy/cookies">Cookies policy</a>
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

    <script type="text/javascript" src="/blog/dist/bundle.js"></script>
</body>

</html>