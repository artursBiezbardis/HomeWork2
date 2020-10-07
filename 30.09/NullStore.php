<?php


class NullStore implements StorageInterface
{

    public function save(): void
    {
        // TODO: Implement save() method.
    }

    public function readFile(): array
    {
        return [];
    }
}