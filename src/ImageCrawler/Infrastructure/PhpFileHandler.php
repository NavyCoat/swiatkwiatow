<?php


namespace NavyCoat\SwiatKwiatow\ImageCrawler\Infrastructure;


use NavyCoat\SwiatKwiatow\ImageCrawler\Application\UrlFileHandler;

class PhpFileHandler implements UrlFileHandler
{
    public function getFileContent(string $url): string
    {
        return file_get_contents($url);
    }
}