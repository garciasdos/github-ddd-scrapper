<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\ValueObject\RepositoryName;

final class GetRepositoryFromRepositoryName
{
    private GitHubRepository $gitHubRepository;

    public function __construct(GitHubRepository $gitHubRepository)
    {
        $this->gitHubRepository = $gitHubRepository;
    }

    public function __invoke(RepositoryName $name)
    {
        return $this->gitHubRepository->findByName($name);
    }
}
