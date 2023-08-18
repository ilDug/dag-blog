<?php

namespace DAG;

class Config
{

    /**
     *  il percorso alla cartella che contiene le sottocartelle dei posts
     * ogni sottocartella è nominata con il codice dell'articolo.
     */
    public static $postsPath = "/app/assets/blog/posts";

    /** 
     * il percorso al file che contiene lo script di google adSense
     */
    public static $adsScriptTemplate = __DIR__ . "/../scripts/google-ads.template.html";
    
}
