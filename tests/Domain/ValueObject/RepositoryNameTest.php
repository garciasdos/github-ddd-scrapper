<?php

declare(strict_types=1);

namespace App\Tests\Domain\ValueObject;

use App\Domain\ValueObject\InvalidRepositoryNameException;
use App\Domain\ValueObject\RepositoryName;
use PHPUnit\Framework\TestCase;

final class RepositoryNameTest extends TestCase
{
    public function testFromOwnerAndNamePair(): void
    {
        $string = 'garciasdos/repository';

        $repositoryName = RepositoryName::fromOwnerAndNamePairString($string);

        $this->assertSame('repository', $repositoryName->value());
    }

    public function testFromOwnerAndNamePairWhenFormatIsNotCorrect(): void
    {
        $string = 'garciasdos';

        $this->expectException(InvalidRepositoryNameException::class);

        RepositoryName::fromOwnerAndNamePairString($string);
    }
}
