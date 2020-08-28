<?php


namespace NavyCoat\SwiatKwiatow\ImageCrawler\Application;


interface ImageStorage
{
    public function save(Image $image): void;

    //TO można by transofrmować wpobranie obrazka, bo to nie koniecznie zadanie storage stweirdzac czy jest...
    public function isImageExist(string $url): bool;
}