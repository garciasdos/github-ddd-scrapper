<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\GitHubRepository;
use App\Domain\Repository;
use App\Domain\ValueObject\RepositoryName;
use GuzzleHttp\ClientInterface;

final class GitHubGuzzleRepository implements GitHubRepository
{
    private const RECURSIVE_ENDPOINT = '/repos/%s/%s/git/trees/%s?recursive=1';
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function findByName(RepositoryName $name): Repository
    {
        $response = $this->client->request('GET', $name->value());
        die(print_r($response));
    }
}
