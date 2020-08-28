<?php


namespace NavyCoat\SwiatKwiatow\ImageCrawler\Application;


use Symfony\Component\DomCrawler\Crawler;

interface ImageCrawler
{

    /**
     *
     * @param string $html
     * @return string[]
     */
    public function findImageUrls(string $html): array;
}