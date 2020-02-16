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
    private GitHubCountRepository $gitHubCountRepository;

    public function __construct(GitHubRepository $gitHubRepository)
    {
        $this->gitHubRepository = $gitHubRepository;
    }

    public function __invoke(RepositoryOwner $owner, RepositoryName $name)
    {
        $repository = $this->gitHubRepository->findByOwnerNameAndBranch($owner, $name, RepositoryBranch::master());

        $repository->files()->getFilenameWordList();


    }
}
