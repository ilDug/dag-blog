<?php
require __DIR__ . "/vendor/autoload.php";

/** carica il template dei meta tags */
\ilDug\Web\Meta::$TEMPLATE = __DIR__ . "/lib/meta/meta-tags.html";
\ilDug\Web\Meta::$PLACEHOLDERS = array('%TITLE%', '%MAIN_IMAGE%');


/** adotta gli script da pubblicare */
\ilDug\Web\Scripts::adopt("GOOGLE_ANALYTICS", __DIR__ . "/lib/scripts/google-analytics.template.html");


$router = new \Bramus\Router\Router();

/** HOME */
$router->get('/', function () {
    require __DIR__ . '/pages/home.php';
});

$router->get('/privacy/policy', function () {
    require __DIR__ . '/pages/privacy-policy.php';
});

$router->get('/privacy/cookies', function () {
    require __DIR__ . '/pages/privacy-cookies.php';
});

$router->get('/search', function () {
    require __DIR__ . "/pages/search.php";
});


$router->get('/api/v1/blog/posts', function () {
    require __DIR__ . "/lib/API/archive.php";
});



$router->get('/{post_id}/{title}', function ($post_id) {

    \ilDug\Web\Meta::$TEMPLATE = __DIR__ . "/lib/meta/meta-tags-post.html";
    \ilDug\Web\Meta::$PLACEHOLDERS = array('%TITLE%', '%DESCRIPTION%', '%MAIN_IMAGE%', '%URL%', '%DATE%', '%UPDATE%',);

    try {
        /** definisce la variabile post da consumare nella pagina dedicata al post. */
        $post = new \DAG\Post($post_id);
        /** se il post non è attivo,  lancia una Excwption */
        if (!$post->metadata->publish && getenv("MODE") === "PRODUCTION") throw new \Exception("post non più attivo", 404);

        require __DIR__ . '/pages/post.php';

    } catch (\Exception $err) {
        echo "<script> location.href='/post-not-found'; </script>";
    }
});    


$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] .  ' 404 Not Found');
    require __DIR__ . '/pages/errors/404-page-not-found.php';
});


$router->run();
