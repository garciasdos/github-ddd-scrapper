<?php

declare(strict_types=1);

namespace App\Tests\Domain\ValueObject;

use App\Domain\ValueObject\RepositoryFile;
use App\Domain\ValueObject\RepositoryFiles;
use PHPUnit\Framework\TestCase;

final class RepositoryFilesTest extends TestCase
{
    private string $payload;

    public function setUp()
    {
        $this->payload = '{"sha":"c645416383baa1f6dd39b806d4ae5b691823ee06","url":"https://api.github.com/repos/garciasdos/ivar/git/trees/c645416383baa1f6dd39b806d4ae5b691823ee06","tree":[{"path":".gitignore","mode":"100644","type":"blob","sha":"124deedcdcd6ce804cfb5f27202caa88f5917c3f","size":43,"url":"https://api.github.com/repos/garciasdos/ivar/git/blobs/124deedcdcd6ce804cfb5f27202caa88f5917c3f"},{"path":"README.md","mode":"100644","type":"blob","sha":"ce58f2178ee38d9d1e3c93c02417230c36aafdd1","size":7,"url":"https://api.github.com/repos/garciasdos/ivar/git/blobs/ce58f2178ee38d9d1e3c93c02417230c36aafdd1"}],"truncated":false}';
    }

    public function testFromJsonString(): void
    {
        $expectedRepositoryFiles = [
          RepositoryFile::fromPath('.gitignore'),
          RepositoryFile::fromPath('README.md')
        ];
        $repositoryFiles = RepositoryFiles::fromJsonString($this->payload);

        $this->assertEquals($expectedRepositoryFiles, $repositoryFiles->getAll());
    }

    public function testAdd(): void
    {
        $expectedRepositoryFiles = [
            RepositoryFile::fromPath('.gitignore'),
            RepositoryFile::fromPath('README.md'),
            RepositoryFile::fromPath('Home.xml'),
        ];
        $repositoryFiles = RepositoryFiles::fromJsonString($this->payload);
        $repositoryFiles->add(RepositoryFile::fromPath('Home.xml'));
        $this->assertEquals($expectedRepositoryFiles, $repositoryFiles->getAll());
    }
}
