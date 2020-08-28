<?php

use Monolog\ErrorHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use NavyCoat\SwiatKwiatow\ImageCrawler\Application\DownloadImagesFromWebsiteCommand;
use NavyCoat\SwiatKwiatow\ImageCrawler\Infrastructure\FileSystemStorage;
use NavyCoat\SwiatKwiatow\ImageCrawler\Infrastructure\PhpFileHandler;
use NavyCoat\SwiatKwiatow\ImageCrawler\Infrastructure\SymfonyImageCrawler;

require dirname(__DIR__).'/vendor/autoload.php';

//Configuration
$logger = new Logger('app');

//TODO: Zmienić na error, schować wyświetlanie błędów.
$logger->pushHandler(new StreamHandler(__DIR__.'/log.err', Logger::WARNING));
ErrorHandler::register($logger);

//todo: informacja o phar::canWrite();

$crawler = new SymfonyImageCrawler();
$downloader = new PhpFileHandler();
$storage = new FileSystemStorage(__DIR__);

$command = new DownloadImagesFromWebsiteCommand($crawler, $downloader, $storage);

$command->run('https://sklep.swiatkwiatow.pl/');