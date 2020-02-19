<?php

declare(strict_types=1);

namespace App\Tests\Domain\ValueObject;

use App\Domain\ValueObject\RepositoryFile;
use PHPUnit\Framework\TestCase;

final class RepositoryFileTest extends TestCase
{
    public function testRepositoryFileIsInstantiatingWell()
    {
        $repoFile = RepositoryFile::fromPath('/var/www/fileController.php');
        $this->assertSame('/var/www/fileController.php', $repoFile->path());
    }

    public function testFilenameMethodStubs()
    {
        $repoFile = RepositoryFile::fromPath('/var/www/fileController.php');
        $this->assertSame('fileController', $repoFile->filename());
        $this->assertSame('php', $repoFile->filetype());
        $this->assertSame(['file', 'Controller'], $repoFile->splittedFilename());
        $this->assertSame('Controller', $repoFile->classType());
    }
}
