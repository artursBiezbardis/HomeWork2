<?php declare(strict_types=1);


interface StorageInterface
{
    public function save(): void;

    public function readFile(): array;
}