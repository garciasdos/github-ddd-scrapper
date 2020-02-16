<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\ValueObject\RepositoryBranch;
use App\Domain\ValueObject\RepositoryName;
use App\Domain\ValueObject\RepositoryOwner;

interface GitHubRepository
{
    public function findByOwnerNameAndBranch(RepositoryOwner $owner, RepositoryName $name,RepositoryBranch $branch): Repository;
}
