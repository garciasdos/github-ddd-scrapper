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

    public function filetype(): string
    {
        return pathinfo($this->path(), PATHINFO_EXTENSION);
    }

    public function filename(): string
    {
        return pathinfo($this->path(), PATHINFO_FILENAME);
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
