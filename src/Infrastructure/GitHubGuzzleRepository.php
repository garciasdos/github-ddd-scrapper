<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\GitHubRepository;
use App\Domain\Repository;
use App\Domain\ValueObject\RepositoryBranch;
use App\Domain\ValueObject\RepositoryFiles;
use App\Domain\ValueObject\RepositoryName;
use App\Domain\ValueObject\RepositoryOwner;
use GuzzleHttp\Client;

final class GitHubGuzzleRepository extends Client implements GitHubRepository
{
    private const RECURSIVE_ENDPOINT = 'https://api.github.com/repos/%s/%s/git/trees/%s?recursive=1';

    public function findByOwnerNameAndBranch(RepositoryOwner $owner, RepositoryName $name, RepositoryBranch $branch): Repository
    {
        $response = $this->get(sprintf(
            self::RECURSIVE_ENDPOINT, $owner->value(), $name->value(), $branch->value()
        ));

        return new Repository($name, $owner, $branch, RepositoryFiles::fromJsonString($response->getBody()->getContents()));
    }
}
