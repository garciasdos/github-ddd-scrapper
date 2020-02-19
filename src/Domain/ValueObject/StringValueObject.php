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

    public static function fromString(string $value): self
    {
        return new static($value);
    }

    public function value(): string
    {
        return $this->value;
    }
}
