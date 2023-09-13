<?php

namespace DAG;

class Sitemap
{

    public static function xml(array $posts): string
    {

        $urls =  [
            ["/", date("Y-m-d"), "1.0"]
        ];
        foreach ($posts as $p) {
            $u =  [$p->metadata->url, $p->metadata->update, "1.0"];
            $urls[] = $u;
        }


        $xml = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
XML;

        foreach ($urls as $u) {
            $block = self::urlBlock($u[0], $u[1], $u[2]);
            $xml .= $block;
        }
        $xml .= "</urlset>";

        return $xml;
    }

    protected static function urlBlock($url, $lastmod, $priority): string
    {
        $prefix = "https://dagtech.it";
        $block  = "<url>";
        $block  .= "<loc>" . $prefix . $url . "</loc>";
        $block  .= "<lastmod>" . $lastmod .  "</lastmod>";
        // $block  .= "<priority>" . $priority . "</priority>";
        $block  .= "</url>";

        return $block;
    }
}
