<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

final class RepositoryFiles
{
    private array $files;

    private function __construct()
    {
    }

    public static function fromJsonString(string $json): self
    {
        $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        $files = new self();

        foreach ($data['tree'] as $file) {
            $files->add(RepositoryFile::fromString($file['path']));
        }

        return $files;
    }

    public function add(RepositoryFile $file): void
    {
        $this->files[] = $file;
    }

    public function getFilenameWordList()
    {

        $list = [];
        foreach ($this->getAll() as $file) {
            if ($file->filetype() === 'php') {
                preg_match_all('/((?:^|[A-Z])[a-z]+)/', $file->filetype(),$list);
            }
        }

        die();
    }

    /** @return RepositoryFile[] */
    public function getAll(): array
    {
        return $this->files;
    }
}
