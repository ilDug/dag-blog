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
    <link rel="stylesheet" href="https://kit.fontawesome.com/b4eb529ed9.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/blog/dist/styles.css">
</head>

<body>
    <?php include __DIR__ . '/views/header.php'; ?>

    <section id="search" class="page-content">
        <div class="container">
            <div class="row my-3">
                <div class="col-12">
                    <div id="search-app">
                        <!-- react application -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/views/footer.php'; ?>

    <script type="text/javascript" src="/blog/dist/bundle.js"></script>
</body>

</html>