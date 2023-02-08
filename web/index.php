<?php
require __DIR__ . "/vendor/autoload.php";

/** carica il template dei meta tags */
\ilDug\Web\Meta::$TEMPLATE = __DIR__ . "/lib/meta/meta-tags.html";
// \ilDug\Web\Meta::$PLACEHOLDERS = array('%TITLE%', '%DESCRIPTION%', '%MAIN_IMAGE%', '%URL%');


/** adotta gli script da pubblicare */
\ilDug\Web\Scripts::adopt("STRUCTURED_DATA", __DIR__ . "/lib/scripts/structured-data.template.html");



$router = new \Bramus\Router\Router();

/** HOME */
$router->get('/', function () {
    require __DIR__ . '/pages/home.php';
});


$router->set404(function () {
    header('HTTP/1.1 404 Not Found');
    require __DIR__ . '/pages/404-page-not-found.php';
});


$router->run();
