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
        foreach ($this->files as $file) {
            if ($file->filetype() === 'php') {
                    if (!array_key_exists($file->classType(), $list)) {
                        $list[$file->classType()] = 0;
                    }
                    $list[$file->classType()]++;
            }
        }

        die(print_r($list));
    }

    /** @return RepositoryFile[] */
    public function getAll(): array
    {
        return $this->files;
    }
}
