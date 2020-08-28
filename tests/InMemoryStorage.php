<?php


namespace tests;


use NavyCoat\SwiatKwiatow\ImageCrawler\Application\Image;
use NavyCoat\SwiatKwiatow\ImageCrawler\Application\ImageStorage;

class InMemoryStorage implements ImageStorage
{
    private array $memory = [];

    /**
     * InMemoryStorage constructor.
     * @param array $memory
     */
    public function __construct(array $memory = [])
    {
        $this->memory = $memory;
    }

    public function save(Image $image): void
    {
        $this->memory[$image->getImageUrl()] = $image;
    }

    public function isImageExist(string $url): bool
    {
        return isset($this->memory[$url]);
    }
}