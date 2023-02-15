<?php

namespace DAG;


/**
 * Un Articolo è un'oggetto ch rappresenta il post, 
 * ma contiene solo un numero limitato di informazioni e metadata.
 * Non possiede il contenuto in formato HTML per risparmiare memoria.
 */
class Article
{
    public string $filepath;
    public object $metadata;
    public string $markdown;
    public object $image;
    public string $summary;
    public $tags = array();

    function __construct($post_id)
    {
        $this->filepath = Post::get_md_file_path_from_id($post_id);
        $this->metadata = Post::extract_metadata($this->filepath);
        $this->markdown = $this->metadata->body();
        $this->image = Post::main_image($this->markdown);
        $this->summary = Post::generate_summary($this->markdown);
        foreach ($this->metadata->tags as $tag) {
            $this->tags[]  =  '<span class="me-2"><a href="#"> #' . $tag . '</a></span>';
        }
    }
}
