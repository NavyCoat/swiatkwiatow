<?php


namespace tests;


use NavyCoat\SwiatKwiatow\ImageCrawler\Application\ImageCrawler;

class StubCrawler implements ImageCrawler
{
    private array $result;

    /**
     * StubCrawler constructor.
     * @param array $result
     */
    public function __construct(array $result)
    {
        $this->result = $result;
    }

    public function findImageUrls(string $html): array
    {
        return $this->result;
    }
}