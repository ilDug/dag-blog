<!DOCTYPE html>
<html lang="it">

<head>
    <!-- META -->
    <?php
    \ilDug\Web\Meta::publish([
        $post->metadata->title,
        $post->summary,
        "https://blog.dagtech.it" . $post->main_image_src(),
        "https://blog.dagtech.it/" . $post->metadata->url,
    ]);
    \ilDug\Web\Scripts::run(['STRUCTURED_DATA'])
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
                <div class="col-lg-2"></div>
                <div class="col-lg-7">
                    <div class="metadata">
                        <p class="mb-0 ">
                            <span>author:
                                <strong>
                                    <i class="fa-brands fa-github ms-2 me-1"></i><?php echo $post->metadata->author; ?>
                                </strong>
                            </span>
                            <br>
                            <span>updated:
                                <em>
                                    <i class="fa-light fa-calendar ms-2 me-1"></i> <?php echo date('d M Y', strtotime($post->metadata->date)); ?>
                                </em>
                            </span>
                        </p>
                        <p class="mb-0">
                            <?php foreach ($post->metadata->tags as $tag) {
                                echo '<span class="me-2"><a href="#"> #' . $tag . '</a></span>';
                            }  ?>
                        </p>
                    </div>

                    <article class="article">
                        <?php echo $post->body; ?>
                    </article>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/views/footer.php';
    ?>

    <script type="text/javascript" src="/dist/bundle.js"></script>
</body>

</html>