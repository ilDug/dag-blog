<?php

namespace DAG;

class Blog
{

    public $archive = array();

    function __construct()
    {
        // to do
    }

    private function load()
    {
        $dir = \DAG\Config::$postsPath;
        $ids = array();
        $md_files = array();

        foreach (new \DirectoryIterator($dir) as $d) {
            $id =  $d->getFilename();
            $md_file = Post::get_md_file_path_from_id($id);
        }
    }

    
}
