<?php

$articles = \DAG\Blog::load();

/** trasforma il FrontMatter in un oggetto classico */
foreach ($articles as $a) {
    $a->metadata = (object)$a->metadata->matter();
    // $a->image = $a->image;
}

$archive = json_encode($articles);

header('content-type: application-json');

echo $archive;
