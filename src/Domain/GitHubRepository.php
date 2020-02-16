<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\ValueObject\RepositoryName;

interface GitHubRepository
{
    public function findByName(RepositoryName $name): Repository;
}
