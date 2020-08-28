<?php


namespace tests;


use NavyCoat\SwiatKwiatow\ImageCrawler\Application\DownloadImagesFromWebsiteCommand;
use NavyCoat\SwiatKwiatow\ImageCrawler\Application\Image;
use NavyCoat\SwiatKwiatow\ImageCrawler\Application\ImageCrawler;
use NavyCoat\SwiatKwiatow\ImageCrawler\Infrastructure\SymfonyImageCrawler;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{

    public function test_symfony_crawler_search_for_images()
    {
        //Given
        $html = file_get_contents(__DIR__.'/data/images.html');
        $imageCrawler = new SymfonyImageCrawler();

        //When
        $result = $imageCrawler->findImageUrls($html);

        //Then
        $expected = [
            'https://example.com/1.jpg',
            'https://example.com/2.jpg',
        ];
        $this->assertEquals($expected, $result);
    }

    public function test_images_are_downloaded_into_storage()
    {
        //given
        $storage = new InMemoryStorage([]);
        $downloader = new StubFileHandler();
        $crawler = new StubCrawler(['https://example.com/1.jpg', 'https://example.com/2.jpg']);

        $command = new DownloadImagesFromWebsiteCommand($crawler, $downloader, $storage);

        //when
        $command->run('https://example.com');

        //then
        $this->assertTrue($storage->isImageExist('https://example.com/1.jpg'));
        $this->assertTrue($storage->isImageExist('https://example.com/2.jpg'));
    }

    public function test_already_downloaded_images_are_omitted()
    {
        //Given
        $image = new Image('https://example.com/1.jpg', 'foo');
        $storage = new InMemoryStorage();
        $storage->save($image);

        $downloader = new StubFileHandler();
        $crawler = new StubCrawler(['https://example.com/1.jpg', 'https://example.com/2.jpg']);
        $command = new DownloadImagesFromWebsiteCommand($crawler, $downloader, $storage);

        //when
        $command->run('https://example.com');

        //then
        //Downloaded website then second image
        $this->assertEquals(['https://example.com', 'https://example.com/2.jpg'], $downloader->getProcessedUrls());
    }

    public function test_errors_are_logged_to_file_log_dot_err()
    {
        //Given

        //When

        //Then
    }
}