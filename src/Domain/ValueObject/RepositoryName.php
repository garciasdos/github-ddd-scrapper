<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

final class RepositoryName extends StringValueObject
{
    private const SEPARATOR = '/';

    public static function fromString(string $value): self
    {
        return new static($value);
    }

    public static function fromOwnerAndNamePairString(string $repositoryOwnerSlashName): self
    {
        if (strpos($repositoryOwnerSlashName, self::SEPARATOR) === false) {
            throw new InvalidRepositoryNameException(sprintf('%s is not valid. Format should be {owner/repo}', $repositoryOwnerSlashName));
        }
        $data = explode(self::SEPARATOR, $repositoryOwnerSlashName);
        return new static($data[1]);
    }
}
