<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\ValueObject\RepositoryBranch;
use App\Domain\ValueObject\RepositoryController;
use App\Domain\ValueObject\RepositoryFile;
use App\Domain\ValueObject\RepositoryName;
use App\Domain\ValueObject\RepositoryOwner;
use App\Domain\ValueObject\RepositoryFiles;
use App\Domain\ValueObject\RepositoryTests;

final class Repository
{
    private RepositoryName $name;
    private RepositoryOwner $owner;
    private RepositoryBranch $branch;
    private RepositoryFiles $files;

    public function __construct(RepositoryName $name, RepositoryOwner $owner, RepositoryBranch $branch, RepositoryFiles $files)
    {
        $this->name = $name;
        $this->owner = $owner;
        $this->branch = $branch;
        $this->files = $files;
    }

    public function name(): RepositoryName
    {
        return $this->name;
    }

    public function owner(): RepositoryOwner
    {
        return $this->owner;
    }

    public function branch(): RepositoryBranch
    {
        return $this->branch;
    }

    public function files(): RepositoryFiles
    {
        return $this->files;
    }
}
