<?php

namespace DAG;

class Post
{
    /** il percorso assoluto del file */
    private string $path;

    /** il contenuto in markdown del post */
    private string $markdown;

    /** oggetto che contiene i metadata contenuti nel FRONT  MATTER del post */
    public object $metadata;

    /** HTML del post */
    public string $body;

    /**
     * immagine principale con le seguenti proprietà:
     * ->src = il percorso dell'immagine
     * ->alt = il nome alternativo dell'immagine
     * ->markdown = il markdown completo dell'immagine
     * ->html = il tag img dell'immagine
     */
    public object $image;

    /** il sommario ricavato dal primo blockquote del post */
    public string $summary;

    function __construct($post_id)
    {
        $this->path = self::get_md_file_path_from_id($post_id);
        $this->metadata = self::extract_metadata($this->path);
        $this->markdown = $this->metadata->body();
        $this->body = self::parse_images(self::parsedown($this->markdown));
        $this->image = self::main_image($this->markdown);
        $this->summary = self::generate_summary($this->markdown);
    }


    /**
     * restituisce il percorso del file MD contenuto nella cartella 
     * con il nome dell'id fornito come argomento.
     * 
     * Si ferma non appena trova il primo file MD
     */
    static function get_md_file_path_from_id($post_id): string
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
    static function extract_metadata($path): object
    {
        $content = file_get_contents($path);
        $matter = \Spatie\YamlFrontMatter\YamlFrontMatter::parse($content);
        // $this->markdown = $matter->body();
        // $this->metadata = $matter;
        return $matter;
    }

    /**
     * trasforma il contenuto con parsedown
     */
    static function parsedown($mardown): string
    {
        $pd = new ParsedownMath();
        return $pd->text($mardown);
    }


    /** 
     * inserisce le immagini in un elemento per la visualizzazione corretta
     */
    static function parse_images($body)
    {
        return preg_replace('/<img([\w\W]+?)\/>/', '<figure class="figure"><img $1 class=""/></figure>', $body);
    }


    /**
     * ritorna una oggeto che contiene le informazioni dell'immagine principale:
     * ->src = il percorso dell'immagine.
     * ->alt = il nome alternativo dell'immagine
     * ->markdown = il markdown completo dell'immagine
     * ->html = il tag img dell'immagine
     */
    static function main_image($markdown): object
    {
        $pd = new \Parsedown();

        preg_match('/\!\[(.*)\]\((.*)\)/', $markdown, $matches);
        $image = array();

        $image['markdown'] = $matches[0] ?? null;
        $image['alt'] = $matches[1] ?? null;
        $image['src'] = $matches[2] ?? null;
        $image['html'] = $pd->text($image['markdown']) ?? null;
        $image['html'] = self::parse_images($image['html']) ?? null;
        return (object) $image;
    }

    static function generate_summary($markdown): string
    {
        preg_match('/^>(.*)$/misU', $markdown, $matches);
        $summary =  $matches[1] ?? null;
        $summary =  str_replace('*', '', $summary);
        return $summary;
    }
}
