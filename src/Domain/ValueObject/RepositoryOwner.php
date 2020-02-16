<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

final class RepositoryOwner extends StringValueObject
{
    private const SEPARATOR = '/';

    public static function fromOwnerAndNamePairString(string $repositoryOwnerSlashName): self
    {
        if (strpos($repositoryOwnerSlashName, self::SEPARATOR) === false) {
            throw new InvalidRepositoryNameException(sprintf('%s is not valid. Format should be {owner/repo}', $repositoryOwnerSlashName));
        }
        $data = explode(self::SEPARATOR, $repositoryOwnerSlashName);
        return new static($data[0]);
    }
}
