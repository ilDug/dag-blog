<?php

namespace DAG;

class ParseDag
{

    public  string $body;

    function __construct($markdown)
    {
        $this->body = self::parse_latex($markdown);
        $this->body = self::parse_images($this->body);
        $this->body = self::parse_tables($this->body);
    }


    /**
     * trasforma il contenuto con parsedown
     */
    static function parse_latex($markdown): string
    {
        $pd = new ParsedownMath();
        return $pd->text($markdown);
    }


    /**
     * aggiungela classe bootstrap alle tabelle
     */
    static function parse_tables($body): string
    {
        return preg_replace('/<table>/', '<table class="table">', $body);
    }


    /** 
     * inserisce le immagini in un elemento per la visualizzazione corretta
     */
    static function parse_images($body)
    {
        return preg_replace('/<img([\w\W]+?)\/>/', '<figure class="figure"><img $1 class=""/></figure>', $body);
    }
}
