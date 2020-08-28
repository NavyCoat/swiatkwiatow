<?php


namespace NavyCoat\SwiatKwiatow\ImageCrawler\Infrastructure;


use NavyCoat\SwiatKwiatow\ImageCrawler\Application\Image;
use NavyCoat\SwiatKwiatow\ImageCrawler\Application\ImageStorage;

class FileSystemStorage implements ImageStorage
{
    private string $path;

    /**
     * FileSystemStorage constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function save(Image $image): void
    {
        file_put_contents(dirname($this->path).'/'.basename($image->getImageUrl()), $image->getContent());
    }

    public function isImageExist(string $url): bool
    {
        return file_exists(dirname($this->path).'/'.basename($url));
    }
}