<?php


namespace NavyCoat\SwiatKwiatow\ImageCrawler\Application;


class Image
{
    private string $imageUrl;
    private string $content;

    /**
     * Image constructor.
     * @param string $imageUrl
     * @param string $content
     */
    public function __construct(string $imageUrl, string $content)
    {
        $this->imageUrl = $imageUrl;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}