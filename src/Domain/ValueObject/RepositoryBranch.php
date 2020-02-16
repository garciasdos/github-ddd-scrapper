<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

final class RepositoryBranch extends StringValueObject
{
    private const MASTER = 'master';

    public static function master(): self
    {
        return new static(self::MASTER);
    }
}
