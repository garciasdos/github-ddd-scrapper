<?php

declare(strict_types=1);

namespace App\Tests\Application;

use App\Application\GetRepositoryCountFromOwnerAndName;
use App\Domain\GitHubRepository;
use App\Domain\Repository;
use App\Domain\ValueObject\RepositoryBranch;
use App\Domain\ValueObject\RepositoryFiles;
use App\Domain\ValueObject\RepositoryName;
use App\Domain\ValueObject\RepositoryOwner;
use PHPUnit\Framework\TestCase;

use function Lambdish\Phunctional\apply;

final class GetRepositoryCountFromOwnerAndNameTest extends TestCase
{
    public function testSutIsHavingCorrectBehaviour(): void
    {
        $payload = '{"sha":"c645416383baa1f6dd39b806d4ae5b691823ee06","url":"https://api.github.com/repos/garciasdos/ivar/git/trees/c645416383baa1f6dd39b806d4ae5b691823ee06","tree":[{"path":"TryingTest.php","mode":"100644","type":"blob","sha":"124deedcdcd6ce804cfb5f27202caa88f5917c3f","size":43,"url":"https://api.github.com/repos/garciasdos/ivar/git/blobs/124deedcdcd6ce804cfb5f27202caa88f5917c3f"},{"path":"HeyController.php","mode":"100644","type":"blob","sha":"ce58f2178ee38d9d1e3c93c02417230c36aafdd1","size":7,"url":"https://api.github.com/repos/garciasdos/ivar/git/blobs/ce58f2178ee38d9d1e3c93c02417230c36aafdd1"}],"truncated":false}';
        $gitHubRepository = $this->createMock(GitHubRepository::class);
        $gitHubRepository
            ->expects($this->once())
            ->method('findByOwnerNameAndBranch')
            ->willReturn(
                new Repository(
                    RepositoryName::fromString('Test'),
                    RepositoryOwner::fromString('Hey'),
                    RepositoryBranch::master(),
                    RepositoryFiles::fromJsonString($payload)
                )
            );
        $sut = new GetRepositoryCountFromOwnerAndName($gitHubRepository);

        $repositoryCount = apply($sut, [
            'Name',
            'Owner'
        ]);

        $expected = [
          'Test' => 1,
          'Controller' => 1
        ];

        $this->assertEquals($expected, $repositoryCount);
    }
}
