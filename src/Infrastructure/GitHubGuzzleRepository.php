<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\GitHubRepository;
use App\Domain\Repository;
use App\Domain\ValueObject\RepositoryBranch;
use App\Domain\ValueObject\RepositoryName;
use App\Domain\ValueObject\RepositoryOwner;
use GuzzleHttp\ClientInterface;

final class GitHubGuzzleRepository implements GitHubRepository
{
    private const RECURSIVE_ENDPOINT = '/repos/%s/%s/git/trees/%s?recursive=1';
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function findByNameOwnerAndBranch(RepositoryName $name, RepositoryOwner $owner, RepositoryBranch $branch): Repository
    {
        $response = $this->client->request('GET', sprintf(
            self::RECURSIVE_ENDPOINT, $name->value(), $owner->value(), $branch->value()
        ));
        die(print_r($response));
    }
}
