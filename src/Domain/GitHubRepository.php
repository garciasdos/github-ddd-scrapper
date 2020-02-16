<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\ValueObject\RepositoryName;

interface GitHubRepository
{
    public function findByNameOwnerAndBranch(RepositoryName $name): Repository;
}
