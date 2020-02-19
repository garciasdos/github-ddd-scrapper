<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\GitHubRepository;
use App\Domain\ValueObject\RepositoryBranch;
use App\Domain\ValueObject\RepositoryName;
use App\Domain\ValueObject\RepositoryOwner;

final class GetRepositoryCountFromOwnerAndName
{
    private GitHubRepository $gitHubRepository;

    public function __construct(GitHubRepository $gitHubRepository)
    {
        $this->gitHubRepository = $gitHubRepository;
    }

    public function __invoke(string $owner, string $name)
    {
        $repository = $this->gitHubRepository->findByOwnerNameAndBranch(RepositoryOwner::fromOwnerAndNamePairString($owner), RepositoryName::fromOwnerAndNamePairString($name), RepositoryBranch::master());

        return $repository->files()->getRepositoryCount();
    }
}
