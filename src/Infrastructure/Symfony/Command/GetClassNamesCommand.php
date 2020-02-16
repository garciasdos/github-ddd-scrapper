<?php

declare(strict_types=1);

namespace App\Infrastructure\Symfony\Command;

use App\Application\GetRepositoryFromRepositoryName;
use App\Domain\ValueObject\RepositoryName;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use function Lambdish\Phunctional\apply;

final class GetClassNamesCommand extends Command
{
    protected static $defaultName = 'app:get-classes-from-repo';

    private GetRepositoryFromRepositoryName $getRepositoryFromRepositoryName;

    public function __construct(GetRepositoryFromRepositoryName $getRepositoryFromRepositoryName)
    {
        parent::__construct();
        $this->getRepositoryFromRepositoryName = $getRepositoryFromRepositoryName;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Gets the class names from a GitHub PHP repository.')
            ->addArgument('repository', InputArgument::REQUIRED, 'The name of the repository.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $repositoryName = $input->getArgument('repository');

        $repository = apply($this->getRepositoryFromRepositoryName, RepositoryName::fromString($repositoryName));

        return 0;
    }
}
