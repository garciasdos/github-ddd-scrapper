<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

final class RepositoryName
{
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $name)
    {
        self::validateString($name);

        return new self($name);
    }

    private static function validateString(string $name): void
    {
        if (!filter_var($name, FILTER_VALIDATE_URL)) {
            throw new InvalidRepositoryNameException(sprintf('%s is not a url', $name));
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
