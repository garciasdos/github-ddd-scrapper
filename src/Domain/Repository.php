<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\ValueObject\RepositoryBranch;
use App\Domain\ValueObject\RepositoryController;
use App\Domain\ValueObject\RepositoryName;
use App\Domain\ValueObject\RepositoryOwner;
use App\Domain\ValueObject\RepositoryServices;
use App\Domain\ValueObject\RepositoryTests;

final class Repository
{
    private RepositoryName $name;
    private RepositoryOwner $owner;
    private RepositoryBranch $branch;
    private RepositoryServices $services;
    private RepositoryController $controller;
    private RepositoryTests $repositoryTests;

    public function __construct(RepositoryName $name, RepositoryOwner $owner, RepositoryBranch $branch, RepositoryServices $services, RepositoryController $controller, RepositoryTests $repositoryTests)
    {
        $this->name = $name;
        $this->owner = $owner;
        $this->branch = $branch;
        $this->services = $services;
        $this->controller = $controller;
        $this->repositoryTests = $repositoryTests;
    }
}
