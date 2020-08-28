<?php


namespace NavyCoat\SwiatKwiatow\ImageCrawler\Application;


interface UrlFileHandler
{
    public function getFileContent(string $url): string;
}