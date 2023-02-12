<?php

namespace DAG;

use Parsedown;

class Post
{
    /** il percorso assoluto del file */
    private string $path;
    private string $markdown;
    public object $metadata;
    public string $body;

    function __construct($post_id)
    {
        $this->path = $this->get_md_file_path_from_id($post_id);
        $this->get_metadata($this->path);
        $this->parsedown($this->markdown);
    }


    /**
     * restituisce il percorso del file MD contenuto nella cartella 
     * con il nome dell'id fornito come argomento.
     * 
     * Si ferma non appena trova il primo file MD
     */
    private function get_md_file_path_from_id($post_id): string
    {
        /** se il file non esiste ritorna un exception
         * altrimenti ritorna il file MARKDOWN
         */
        $dir = \DAG\Config::$postsPath . "/" . $post_id;
        if (!file_exists($dir))  throw new \Exception("il post con questo codice non esiste", 404);

        /**
         *  ricerca il file all'interno della directory.
         * si ferma non appena trova il primo file MD
         */
        foreach (new \DirectoryIterator($dir) as $f) {
            if ($f->getExtension() === "md") {
                return $f->getRealPath();
                break;
            }
        }
    }


    /** 
     * ottiene i metadata dell'articolo
     */
    private function get_metadata($path)
    {
        $content = file_get_contents($path);
        $object = \Spatie\YamlFrontMatter\YamlFrontMatter::parse($content);
        $this->markdown = $object->body();
        $this->metadata = $object;
    }

    /**
     * trasforma il contenuto con parsedown
     */
    private function parsedown($mardown)
    {
        $pd = new \Parsedown();
        $this->body = $pd->text($mardown);
    }
}