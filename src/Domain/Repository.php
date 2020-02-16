<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\ValueObject\RepositoryName;

final class Repository
{
    private RepositoryName $name;
    private RepositoryServices $services;
    private RepositoryController $controller;
    private RepositoryTests $repositoryTests;

    public function __construct(RepositoryName $name, RepositoryServices $services, RepositoryController $controller, RepositoryTests $repositoryTests)
    {
        $this->name = $name;
        $this->services = $services;
        $this->controller = $controller;
        $this->repositoryTests = $repositoryTests;
    }


}
