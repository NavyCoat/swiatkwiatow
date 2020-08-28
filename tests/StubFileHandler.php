<?php


namespace tests;


use NavyCoat\SwiatKwiatow\ImageCrawler\Application\UrlFileHandler;

class StubFileHandler implements UrlFileHandler
{
    private array $processedUrls = [];

    public function getFileContent(string $url): string
    {
        $this->processedUrls[] = $url;
        return 'filecontent';
    }

    /**
     * @return array
     */
    public function getProcessedUrls(): array
    {
        return $this->processedUrls;
    }
}