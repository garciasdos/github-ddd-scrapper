<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\GitHubRepository;
use App\Domain\Repository;
use App\Domain\ValueObject\RepositoryName;

final class GitHubGuzzleRepository implements GitHubRepository
{
    public function __construct()
    {
    }

    public function findByName(RepositoryName $name): Repository
    {

    }
}
