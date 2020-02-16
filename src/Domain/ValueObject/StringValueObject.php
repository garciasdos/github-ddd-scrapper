<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

abstract class StringValueObject
{
    protected string $value;

    protected function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $name): self
    {
        return new static($name);
    }

    public function value(): string
    {
        return $this->value;
    }
}
