<?php

namespace DAG;

class Blog
{

    /**
     * elenco dei nomi delle cartelle nella directory dei Posts
     */
    static function archive()
    {
        $dir = \DAG\Config::$postsPath;
        $ids = array();
        foreach (new \DirectoryIterator($dir) as $d) {
            $ids[] = $d->getFilename();
        }

        sort($ids);
        return $ids;
    }


    /** 
     * ritorna l'articolo precedente o successivo
     *  in base alla direzione pasata come argomento 
     * */
    static function sibling(int $current_code, $direction): Article | null
    {
        $article = null;
        $archive = self::archive();

        /** se il numero di cartelle è minore o uguale a 1, allora si ferma */
        if (count($archive) <= 1) return null;

        /** inizializza il contatore con l'indice della cartella corrente */
        $i = array_search((string)$current_code, $archive);
        $loop = true;

        do {
            if ($direction == 'prev') {
                if ($i == 0) break;
                $i--;
            } else if ($direction === 'next') {
                if ($i == (count($archive) - 1)) break;
                $i++;
            } else break;

            $article = new  Article($archive[$i]);

            //se l'articolo è attivo, ferma il loop
            $loop = !$article->metadata->published;
        } while ($loop);

        return $article;
    }


    /** restituisce l'articolo attivo successivo a quello corrente passato come argomento */
    static function next(int $current_code): Article
    {
        return self::sibling($current_code, 'next');
    }

    /** restituisce il Article attivo successivo a quello corrente passato come argomento */
    static function prev(int $current_code): Article
    {
        return self::sibling($current_code, 'prev');
    }


    /**
     * carica tutti gli Articolo che hanno la proprietà Publised.
     */
    static function load(): array
    {
        $archive = self::archive();
        if (count($archive) == 0) return [];

        $articles = array();

        foreach ($archive as $id) {
            $a = new Article($id);
            if ($a->metadata->published)
                $article[] = $a;
        }

        function sort_by_date(Article $a, Article $b)
        {
            $dateA =  strtotime($a->metadata->date);
            $dateB =  strtotime($b->metadata->date);

            if ($dateA == $dateB) return 0;
            return ($dateA < $dateB) ? -1 : 1;
        }

        /** ordina in base alla data */
        usort($articles, 'sort_by_date');

        return $articles;
    }
}
