<?php

$articles = \DAG\Blog::load();

$archive = json_encode($articles);

echo $archive;
