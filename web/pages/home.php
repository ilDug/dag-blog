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

    <section id="home" class="page-content">
        <div class="container">
            <div class="row mt-3">
                <div class="col-12">
                    <h1>Dag Blog</h1>
                </div>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/views/footer.php'; ?>

    <script type="text/javascript" src="/dist/bundle.js"></script>
</body>

</html>