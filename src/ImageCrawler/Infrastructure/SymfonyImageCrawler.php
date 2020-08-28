<?php


namespace NavyCoat\SwiatKwiatow\ImageCrawler\Infrastructure;


use NavyCoat\SwiatKwiatow\ImageCrawler\Application\ImageCrawler;
use Symfony\Component\DomCrawler\Crawler;

class SymfonyImageCrawler implements ImageCrawler
{
    /**
     *
     * @param string $html
     * @return string[]
     */
    public function findImageUrls(string $html): array
    {
        $crawler = new Crawler($html);

        return $crawler->filterXpath('//img')
            ->extract(array('src'));
    }
}