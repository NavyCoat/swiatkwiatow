<?php


namespace NavyCoat\SwiatKwiatow\ImageCrawler\Application;


use tests\InMemoryStorage;
use tests\StubCrawler;
use tests\StubFileHandler;

class DownloadImagesFromWebsiteCommand
{
    /**
     * @var ImageCrawler
     */
    private ImageCrawler $crawler;

    /**
     * @var UrlFileHandler
     */
    private UrlFileHandler $fileHandler;

    /**
     * @var ImageStorage
     */
    private ImageStorage $storage;

    /**
     * Foo constructor.
     * @param ImageCrawler $crawler
     * @param UrlFileHandler $fileHandler
     * @param ImageStorage $storage
     */
    public function __construct(ImageCrawler $crawler, UrlFileHandler $fileHandler, ImageStorage $storage)
    {
        $this->crawler = $crawler;
        $this->fileHandler = $fileHandler;
        $this->storage = $storage;
    }

    public function run(string $url)
    {
        $html = $this->fileHandler->getFileContent($url);
        $urls = $this->crawler->findImageUrls($html);

        $count = 3;
        //todo: miejsce na strategię / sprawdzanie urlów etc.
        //Muszę kończyć więc losowe to pokolei.
        //case: Do rozstrygnięcia co jeżeli nie ma 3 obrazków do pobrania?
        //case: Aktualizowanie obrazków.

        foreach ($urls as $imageUrl) {
            if (!$this->storage->isImageExist($imageUrl) && $count > 0){
                $count--;
                $this->storage->save(new Image($imageUrl, $this->fileHandler->getFileContent($imageUrl)));
            }
        }
    }
}