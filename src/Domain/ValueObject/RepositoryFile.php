<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

final class RepositoryFile
{
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public static function fromString(string $string): self
    {
        self::validate($string);

        return new self($string);
    }

    public function splittedFilename()
    {
        return preg_split('/(?=[A-Z])/', $this->filename(), -1,PREG_SPLIT_NO_EMPTY);
    }

    public function classType(): string
    {
        $splittedFilename = $this->splittedFilename();
        return $splittedFilename[array_key_last($splittedFilename)];
    }

    public function filename(): string
    {
        return pathinfo($this->path(), PATHINFO_FILENAME);
    }

    public function filetype(): string
    {
        return pathinfo($this->path, PATHINFO_EXTENSION);
    }

    public function path(): string
    {
        return $this->path;
    }

    private static function validate(string $string): void
    {
//        if (!filter_var($string, )) {
//            throw new InvalidRepositoryFileException(sprintf('%s is not a valid path', $string));
//        }
    }
}
