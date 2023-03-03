<?php

$articles = \DAG\Blog::load();

$archive = json_encode($articles);

header('content-type: application-json');

echo $archive;
