<!DOCTYPE html>
<html lang="it">

<head>
    <!-- META -->
    <?php
    \ilDug\Web\Meta::publish([
        $post->metadata->title,
        $post->summary,
        "https://blog.dagtech.it" . $post->image->src,
        "https://blog.dagtech.it/" . $post->metadata->url,
        $post->metadata->date,
        $post->metadata->update
    ]);
    \ilDug\Web\Scripts::run(['GOOGLE_ANALYTICS', 'GOOGLE_ADS']);
    ?>

    <!-- STYLES  -->
    <link rel="stylesheet" href="/dist/styles.css">
</head>

<body>

    <?php include __DIR__ . '/views/header.php';
    ?>

    <section id="post" class="page-content">
        <div class="container">
            <div class="row mt-3">
                <div class="col-lg-2"></div>
                <div class="col-lg-7">

                    <!-- AVVISA quando il post non è attivo. -->
                    <?php echo $post->metadata->publish === false ? '<div class="alert alert-warning text-warning" role="alert"> <i class="fa-light fa-exclamation-triangle me-3"></i> POST NON ATTIVO! </div>' : ''; ?>

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
                                    <i class="fa-light fa-calendar ms-2 me-1"></i> <?php echo date('d M Y', strtotime($post->metadata->update)); ?>
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





                    <hr class="mt-5 mb-4">
                    <div class="next">
                        <?php
                        $next = \DAG\Blog::next((int) $post->metadata->code);
                        if ($next) {
                            $card_next = new \ilDug\Template(__DIR__ . "/templates/article_sibling_template.html");
                            $card_next->compile(array(
                                "%IMGSRC%" => $next->image->src,
                                "%IMGALT%" => $next->image->alt,
                                "%LINK%" => $next->metadata->url,
                                "%TITLE%" => $next->metadata->title,
                                "%SUMMARY%" => $next->summary,
                                "%DATE%" => $next->metadata->update,
                                "%TAGS%" => implode('', $next->tags),
                                "%AUTHOR%" => $next->metadata->author
                            ));
                            echo $card_next->payload;
                        }
                        ?>
                    </div>

                    <div class="previous">
                        <?php
                        $prev = \DAG\Blog::prev((int) $post->metadata->code);
                        if ($prev) {
                            $card_prev = new \ilDug\Template(__DIR__ . "/templates/article_sibling_template.html");
                            $card_prev->compile(array(
                                "%IMGSRC%" => $prev->image->src,
                                "%IMGALT%" => $prev->image->alt,
                                "%LINK%" => $prev->metadata->url,
                                "%TITLE%" => $prev->metadata->title,
                                "%SUMMARY%" => $prev->summary,
                                "%DATE%" => $prev->metadata->update,
                                "%TAGS%" => implode('', $prev->tags),
                                "%AUTHOR%" => $prev->metadata->author
                            ));
                            echo $card_prev->payload;
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/views/footer.php'; ?>

    <script type="text/javascript" src="/dist/bundle.js"></script>
</body>

</html>